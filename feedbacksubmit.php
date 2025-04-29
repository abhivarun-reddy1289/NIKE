<?php
// Database connection details
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = "";     // default password for XAMPP (empty)
$database = "user_feedback";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$first_name = $conn->real_escape_string($_POST['first_name']);
$last_name = $conn->real_escape_string($_POST['last_name']);
$email = $conn->real_escape_string($_POST['email']);
$mobile = $conn->real_escape_string($_POST['mobile']);
$feedback = $conn->real_escape_string($_POST['feedback']);

// Insert into database
$sql = "INSERT INTO feedbacks (first_name, last_name, email, mobile, feedback)
        VALUES ('$first_name', '$last_name', '$email', '$mobile', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Thank you! Your feedback has been submitted.</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
