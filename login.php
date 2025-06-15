<?php
$host = 'localhost';
$dbname = 'contactus';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check user
$sql = "SELECT * FROM users WHERE email=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    echo "Login successful!";
} else {
    echo "Invalid email or password.";
}

$stmt->close();
$conn->close();
?>
