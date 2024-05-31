<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "college_admission";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the application ID from the URL
$id = $_GET['id'];

// Delete the application from the database
$sql = "DELETE FROM applications WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Application deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

// Redirect back to the view applications page
header("Location: view_applications.php");
exit();
?>
