<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "blood_bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete donor from the database
    $sql = "DELETE FROM donors WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Donor deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
