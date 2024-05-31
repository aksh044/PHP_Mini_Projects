<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "blood_bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $blood_type = $_POST['blood_type'];
    $contact = $_POST['contact'];
    $last_donation_date = date('Y-m-d', strtotime($_POST['last_donation_date']));
    
    // Insert the donor information into the database
    $sql = "INSERT INTO donors (name, age, blood_type, contact, last_donation_date) VALUES ('$name', '$age', '$blood_type', '$contact', '$last_donation_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Donor added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Donor</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_donor.php">Add Donor</a></li>
            <li><a href="view_donors.php">View Donors</a></li>
            
        </ul>
    </nav>

    <h2>Add Donor</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="blood_type">Blood Type:</label>
        <select id="blood_type" name="blood_type" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="last_donation_date">Last Donation Date:</label>
        <input type="date" id="last_donation_date" name="last_donation_date">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
