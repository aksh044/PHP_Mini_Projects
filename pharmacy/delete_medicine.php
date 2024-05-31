<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "pharmacy_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the medicine ID from the URL
$id = $_GET['id'];

// Delete the medicine from the database
$sql = "DELETE FROM medicines WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Medicine deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

// Redirect back to the view medicines page
header("Location: view_medicines.php");
exit();
?>
