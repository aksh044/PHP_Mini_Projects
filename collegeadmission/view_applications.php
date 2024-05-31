<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "college_admission";

$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch applications from the database
$sql = "SELECT id, student_name, age, course, application_date, status FROM applications ORDER BY application_date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
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

    <h2>Applications</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Age</th>
            <th>Course</th>
            <th>Application Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['application_date'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo "<a href='delete_application.php?id=" . $row['id'] . "'>Delete</a> | ";
                echo "<a href='update_application.php?id=" . $row['id'] . "'>Update</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No applications found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
