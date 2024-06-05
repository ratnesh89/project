<?php
include 'db.php';

$sql = "SELECT messages.message, users.username FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.timestamp ASC";
$result = $conn->query($sql);

$messages = [];
while($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

$conn->close();
echo json_encode(['messages' => $messages]);
?>
