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

// Fetch the application details from the database
$sql = "SELECT student_name, age, course, application_date, status FROM applications WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $student_name = $row['student_name'];
    $age = $row['age'];
    $course = $row['course'];
    $status = $row['status'];
} else {
    echo "Application not found.";
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $status = $_POST['status'];

    // Update the application in the database
    $sql = "UPDATE applications SET student_name = '$student_name', age = '$age', course = '$course', status = '$status' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Application updated successfully!";
        header("Location: view_applications.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Application</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_application.php">Submit Application</li>
            <li><a href="view_applications.php">View Applications</a></li>
        </ul>
    </nav>

    <h2>Update Application</h2>
    <form method="post" action="">
        <label for="student_name">Name:</label>
        <input type="text" id="student_name" name="student_name" value="<?php echo $student_name; ?>" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo $age; ?>" required>

        <label for="course">Course:</label>
        <input type="text" id="course" name="course" value="<?php echo $course; ?>" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Pending" <?php if ($status == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="Accepted" <?php if ($status == 'Accepted') echo 'selected'; ?>>Accepted</option>
            <option value="Rejected" <?php if ($status == 'Rejected') echo 'selected'; ?>>Rejected</option>
        </select>

        <input type="submit" value="Update">
    </form>
</body>
</html>
