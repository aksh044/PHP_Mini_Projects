<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "pharmacy_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch medicines from the database
$sql = "SELECT id, name, category, quantity, price FROM medicines ORDER BY name ASC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Medicines</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_medicine.php">Add Medicine</a></li>
            <li><a href="view_medicines.php">View Medicines</a></li>
        </ul>
    </nav>

    <h2>Medicines</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>";
                echo "<a href='delete_medicine.php?id=" . $row['id'] . "'>Delete</a> | ";
                echo "<a href='update_medicine.php?id=" . $row['id'] . "'>Update</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No medicines found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
