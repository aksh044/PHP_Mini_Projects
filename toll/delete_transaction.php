<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "toll_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the transaction ID from the URL
$id = $_GET['id'];

// Delete the transaction from the database
$sql = "DELETE FROM transactions WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Transaction deleted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

// Redirect back to the view transactions page
header("Location: view_transactions.php");
exit();
?>
