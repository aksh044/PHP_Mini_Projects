<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "complaint_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the complaint to mark as completed
$complaint_id = $_GET['id'];

// Update the status of the complaint to 'Completed'
$sql = "UPDATE complaints SET status = 'Completed' WHERE id = $complaint_id";
if ($conn->query($sql) === TRUE) {
    echo "Complaint marked as completed!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

<a href="view_complaints.php">Go back to View Complaints</a>
