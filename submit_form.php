<?php
// Database configuration
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "ally_form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$pronouns = $_POST['pronouns'];
$email = $_POST['email'];
$affiliation = $_POST['affiliation'];
$knowledge = $_POST['knowledge'];
$workshop = $_POST['workshop'];
$actions = implode(", ", $_POST['actions']); // Convert actions array to comma-separated string
$volunteer = $_POST['volunteer'];
$events = $_POST['events'];
$feedback = $_POST['feedback'];
$pledge = isset($_POST['pledge']) ? 1 : 0;

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO submissions (name, pronouns, email, affiliation, knowledge, workshop, actions, volunteer, events, feedback, pledge) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisisssi", $name, $pronouns, $email, $affiliation, $knowledge, $workshop, $actions, $volunteer, $events, $feedback, $pledge);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
