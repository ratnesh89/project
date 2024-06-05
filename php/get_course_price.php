<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_payments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$course = $_GET['course'];
$sql = "SELECT price FROM courses WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $course);
$stmt->execute();
$stmt->bind_result($price);
$stmt->fetch();

$response = array("price" => $price);
echo json_encode($response);

$stmt->close();
$conn->close();
?>
