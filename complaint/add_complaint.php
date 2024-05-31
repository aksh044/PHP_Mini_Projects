<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "complaint_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $complaint_text = $_POST['complaint_text'];
    
    // Insert the complaint into the database
    $sql = "INSERT INTO complaints (complaint_text) VALUES ('$complaint_text')";
    if ($conn->query($sql) === TRUE) {
        echo "Complaint added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Complaint</title>
    <!-- Navbar CSS (You can add your CSS for styling the navbar) -->
    <style>
       /* Styles for the navbar */
nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    background-color: #333;
}

nav ul li {
    margin-right: 10px;
}

nav ul li a {
    text-decoration: none;
    padding: 10px 15px;
    display: block;
    color: white;
    background-color: #333;
    border-radius: 4px;
}

nav ul li a:hover {
    background-color: #555;
}

/* Styles for the form */
form {
    margin-top: 20px;
}

form label {
    display: block;
    margin-bottom: 5px;
}

form input[type="text"] {
    padding: 5px;
    width: 300px;
    margin-bottom: 10px;
}

form input[type="submit"] {
    padding: 8px 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

/* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    margin-top: 10px;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_complaint.php">Add Complaint</a></li>
            <li><a href="view_complaints.php">View Complaints</a></li>
        </ul>
    </nav>

    <h2>Add Complaint</h2>
    <form method="post" action="">
        <label for="complaint_text">Complaint Text:</label>
        <input type="text" id="complaint_text" name="complaint_text" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
