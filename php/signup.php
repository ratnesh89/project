<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollnumber = $_POST['rollnumber'];
    $mobilenumber = $_POST['mobilenumber'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (rollnumber, mobilenumber, password) VALUES ('$rollnumber', '$mobilenumber', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
