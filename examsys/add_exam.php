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

// Define variables and initialize them
$subject_id = $exam_date = $exam_time = $duration = "";
$subject_error = $date_error = $time_error = $duration_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and validate form data
    $subject_id = intval($_POST['subject_id']);
    $exam_date = $_POST['exam_date'];
    $exam_time = $_POST['exam_time'];
    $duration = intval($_POST['duration']);
    
    $errors = false;
    
   

    if (empty($exam_date)) {
        $date_error = "Please provide an exam date.";
        $errors = true;
    }

    if (empty($exam_time)) {
        $time_error = "Please provide an exam time.";
        $errors = true;
    }

    if ($duration <= 0) {
        $duration_error = "Please provide a valid duration.";
        $errors = true;
    }

    // If there are no errors, insert the exam into the database
    if (!$errors) {
        $sql = "INSERT INTO exams (subject_id, exam_date, exam_time, duration)
                VALUES ('$subject_id', '$exam_date', '$exam_time', '$duration')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Exam added successfully!</p>";
        } else {
            echo "<p>Error adding exam: " . $conn->error . "</p>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Exam</title>
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

    <h2>Add Exam</h2>
    <form method="post" action="add_exam.php">
        <label for="subject_id">Subject:</label>
        <select name="subject_id" id="subject_id" required>
        <option value="" disabled selected>Select a subject</option>
    <option value="math">Mathematics</option>
    <option value="science">Science</option>
    <option value="english">English</option>
    <option value="history">History</option>
    <option value="geography">Geography</option>
    <option value="art">Art</option>
    <option value="music">Music</option>
        </select>
        <span class="error"><?php echo $subject_error; ?></span>

        <label for="exam_date">Exam Date:</label>
        <input type="date" name="exam_date" id="exam_date" required>
        <span class="error"><?php echo $date_error; ?></span>

        <label for="exam_time">Exam Time:</label>
        <input type="time" name="exam_time" id="exam_time" required>
        <span class="error"><?php echo $time_error; ?></span>

        <label for="duration">Duration (minutes):</label>
        <input type="number" name="duration" id="duration" required>
        <span class="error"><?php echo $duration_error; ?></span>

        <input type="submit" value="Add Exam">
    </form>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
