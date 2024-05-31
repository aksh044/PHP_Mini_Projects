<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "blood_bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch donors from the database
$sql = "SELECT id, name, age, blood_type, contact, last_donation_date FROM donors ORDER BY name ASC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Donors</title>
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

    <h2>Donors</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Blood Type</th>
            <th>Contact</th>
            <th>Last Donation Date</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['blood_type'] . "</td>";
                echo "<td>" . $row['contact'] . "</td>";
                echo "<td>" . $row['last_donation_date'] . "</td>";
                echo "<td>";
                echo "<a href='delete_donor.php?id=" . $row['id'] . "'>Delete</a> | ";
                echo "<a href='update_donor.php?id=" . $row['id'] . "'>Update</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No donors found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
