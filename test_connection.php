<?php
$db_host = 'localhost';
$db_username = 'your_db_username';
$db_password = 'your_db_password';
$db_name = 'your_db_name';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}

$conn->close();
?>
