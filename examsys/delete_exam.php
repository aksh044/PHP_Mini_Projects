<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "college_examination_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an exam ID is provided in the query parameter
if (isset($_GET['exam_id'])) {
    $exam_id = intval($_GET['exam_id']);
    
    // Prepare the SQL statement to delete the exam
    $stmt = $conn->prepare("DELETE FROM exams WHERE id = ?");
    $stmt->bind_param("i", $exam_id);
    
    // Execute the statement and provide feedback
    if ($stmt->execute()) {
        echo "<p>Exam deleted successfully!</p>";
    } else {
        echo "<p>Error deleting exam: " . $stmt->error . "</p>";
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "<p>No exam ID provided.</p>";
}

// Close the database connection
$conn->close();
?>
