<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "complaint_management";

$conn = new mysqli($servername, $username, $password, $dbname);


// Fetch complaints from the database
$sql = "SELECT id, complaint_text, status, date_created FROM complaints ORDER BY date_created DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Complaints</title>
    <!-- Navbar CSS (You can add your CSS for styling the navbar) -->
    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    padding: 10px;
    background-color: #f5f5f5;
}

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
    color: white;
    text-decoration: none;
    padding: 8px 12px;
    display: block;
    background-color: #333;
    border-radius: 4px;
}

nav ul li a:hover {
    background-color: #555;
}

/* Styles for the table */
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #4CAF50;
    color: white;
}

/* Styles for buttons */
a {
    text-decoration: none;
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border-radius: 4px;
}

a:hover {
    background-color: #45a049;
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

    <h2>Complaints</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Complaint Text</th>
            <th>Status</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['complaint_text'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['date_created'] . "</td>";
                echo "<td>";
                echo "<a href='delete_complaint.php?id=" . $row['id'] . "'>Delete</a> | ";
                echo "<a href='mark_completed.php?id=" . $row['id'] . "'>Mark as Completed</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No complaints found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
