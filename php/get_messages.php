<?php
require 'db.php';
session_start();

$sql = "SELECT messages.*, users.roll_number FROM messages JOIN users ON messages.user_id = users.id ORDER BY messages.timestamp ASC";
$stmt = $pdo->query($sql);

$messages = $stmt->fetchAll();

echo json_encode($messages);
?>
