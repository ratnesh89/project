document.addEventListener("DOMContentLoaded", function() {
    const chatContainer = document.getElementById('chat-container');
    const messageInput = document.getElementById('messageInput');
    const imageInput = document.getElementById('imageInput');
    const sendButton = document.getElementById('sendButton');

    // Function to add a message or image to the chat container
    function addMessage(content, sender, isImage = false) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message');
        if (isImage) {
            messageDiv.innerHTML = `<strong>${sender}:</strong> <img src="${content}" alt="Image">`;
        } else {
            messageDiv.innerHTML = `<strong>${sender}:</strong> ${content}`;
        }
        chatContainer.appendChild(messageDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight; // Scroll to bottom
    }

    // Function to handle sending message or image
    function sendMessage() {
        const message = messageInput.value;
        const imageFile = imageInput.files[0];

        if (message.trim() === '' && !imageFile) return; // Don't send empty message or image

        if (imageFile) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imageUrl = event.target.result;
                addMessage(imageUrl, 'You', true);
                // Send image URL to the server (send AJAX request or WebSocket)
            };
            reader.readAsDataURL(imageFile);
        } else {
            addMessage(message, 'You');
            // Send message to server (send AJAX request or WebSocket)
        }

        messageInput.value = ''; // Clear input fields
        imageInput.value = '';
    }

    // Event listener for send button click
    sendButton.addEventListener('click', sendMessage);

    // Event listener for pressing Enter key in message input
    messageInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });

    // Display current time and date
    const currentDate = new Date();
    addMessage(`Current time and date: ${currentDate.toLocaleString()}`, 'System');
});
