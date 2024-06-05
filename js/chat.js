document.getElementById('chatForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let message = document.getElementById('messageInput').value;
    sendMessage(message);
    document.getElementById('messageInput').value = '';
});

function sendMessage(message) {
    fetch('php/send_message.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            fetchMessages();
        }
    });
}

function fetchMessages() {
    fetch('php/fetch_messages.php')
    .then(response => response.json())
    .then(data => {
        let chatBox = document.getElementById('chatBox');
        chatBox.innerHTML = '';
        data.messages.forEach(msg => {
            let messageElement = document.createElement('div');
            messageElement.classList.add('message');
            if (msg.username === 'admin') {
                messageElement.classList.add('admin');
            }
            messageElement.textContent = msg.username + ': ' + msg.message;
            chatBox.appendChild(messageElement);
        });
    });
}

// Fetch messages every 5 seconds
setInterval(fetchMessages, 5000);

// Initial fetch
fetchMessages();
