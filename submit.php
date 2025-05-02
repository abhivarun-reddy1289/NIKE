<?php
header('Content-Type: application/json');

// For debugging (optional during development)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "user_feedback";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// Sanitize input
$first_name = $conn->real_escape_string($_POST['first_name'] ?? '');
$last_name  = $conn->real_escape_string($_POST['last_name'] ?? '');
$email      = $conn->real_escape_string($_POST['email'] ?? '');
$mobile     = $conn->real_escape_string($_POST['mobile'] ?? '');
$feedback   = $conn->real_escape_string($_POST['feedback'] ?? '');

// Insert
$sql = "INSERT INTO feedbacks (first_name, last_name, email, mobile, feedback)
        VALUES ('$first_name', '$last_name', '$email', '$mobile', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Feedback submitted successfully!"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $conn->error]);
}

$conn->close();
?>
