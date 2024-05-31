<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "complaint_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the complaint to delete
$complaint_id = $_GET['id'];

// Delete the complaint
$sql = "DELETE FROM complaints WHERE id = $complaint_id";
if ($conn->query($sql) === TRUE) {
    echo "Complaint deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

<a href="view_complaints.php">Go back to View Complaints</a>
