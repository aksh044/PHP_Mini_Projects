<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "college_admission";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $application_date = date('Y-m-d');
    
    // Insert the application into the database
    $sql = "INSERT INTO applications (student_name, age, course, application_date, status) VALUES ('$student_name', '$age', '$course', '$application_date', 'Pending')";
    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Application</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_application.php">Submit Application</a></li>
            <li><a href="view_applications.php">View Applications</a></li>
        </ul>
    </nav>

    <h2>Submit Application</h2>
    <form method="post" action="">
        <label for="student_name">Name:</label>
        <input type="text" id="student_name" name="student_name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
