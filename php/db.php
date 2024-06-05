<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multi_section_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<?php
include 'db.php';

$admin_username = 'admin';
$admin_password = password_hash('admin123', PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES ('$admin_username', '$admin_password')";

if ($conn->query($sql) === TRUE) {
    echo "Admin user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

