<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university_payments";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$university = $_POST['university'];
$course = $_POST['course'];
$price = $_POST['price'];

// Process payment logic here (e.g., using a payment gateway API)

// For simplicity, we'll just return a success message
echo "Payment of ₹$price for $course at $university was successful.";

$conn->close();
?>
