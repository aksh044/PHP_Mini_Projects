<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "toll_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch transactions from the database
$sql = "SELECT id, vehicle_number, toll_amount, transaction_date, transaction_time FROM transactions ORDER BY transaction_date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Transactions</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_transaction.php">Add Transaction</a></li>
            <li><a href="view_transactions.php">View Transactions</a></li>
        </ul>
    </nav>

    <h2>Transactions</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Vehicle Number</th>
            <th>Toll Amount</th>
            <th>Transaction Date</th>
            <th>Transaction Time</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['vehicle_number'] . "</td>";
                echo "<td>" . $row['toll_amount'] . "</td>";
                echo "<td>" . $row['transaction_date'] . "</td>";
                echo "<td>" . $row['transaction_time'] . "</td>";
                echo "<td>";
                echo "<a href='delete_transaction.php?id=" . $row['id'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No transactions found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
