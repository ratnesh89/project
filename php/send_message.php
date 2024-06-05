<?php
include 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

session_start();
$user_id = $_SESSION['user_id'];
$message = $data['message'];

$sql = "INSERT INTO messages (user_id, message) VALUES ('$user_id', '$message')";

$response = [];
if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = $conn->error;
}

$conn->close();
echo json_encode($response);
?>
