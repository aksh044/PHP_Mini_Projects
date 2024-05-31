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

// Fetch exams from the database
$sql = "SELECT exams.id, exams.exam_date, exams.exam_time, exams.duration
        FROM exams
        ORDER BY exams.exam_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Exams</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_exam.php">Add Exam</a></li>
            <li><a href="view_exams.php">View Exams</a></li>
        </ul>
    </nav>

    <h2>Available Exams</h2>
    <?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <!-- <th>Subject</th> -->
                <th>Exam Date</th>
                <th>Exam Time</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
              
                <td><?php echo htmlspecialchars($row['exam_date']); ?></td>
                <td><?php echo htmlspecialchars($row['exam_time']); ?></td>
                <td><?php echo htmlspecialchars($row['duration']); ?></td>
                <td>
                    <a href="delete_exam.php?id=<?php echo urlencode($row['id']); ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No exams found.</p>
    <?php endif; ?>

    <?php
    // Free the result set
    if ($result) {
        $result->free();
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
