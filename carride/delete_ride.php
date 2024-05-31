<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "car_ride_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve ride ID from the URL
$ride_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if ride ID is valid
if ($ride_id > 0) {
    // Delete the ride with the specified ID
    $sql = "DELETE FROM rides WHERE id = $ride_id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to view_rides.php with a success message
        header("Location: view_rides.php?msg=Ride+deleted+successfully");
    } else {
        // Redirect back to view_rides.php with an error message
        header("Location: view_rides.php?msg=Error+deleting+ride");
    }
} else {
    // Redirect back to view_rides.php with an error message
    header("Location: view_rides.php?msg=Invalid+ride+ID");
}

// Close the database connection
$conn->close();
?>
