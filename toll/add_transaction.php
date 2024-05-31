<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "toll_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle_number = $_POST['vehicle_number'];
    $toll_amount = $_POST['toll_amount'];
    $transaction_date = $_POST['transaction_date'];
    $transaction_time = $_POST['transaction_time'];

    // Insert the transaction into the database
    $sql = "INSERT INTO transactions (vehicle_number, toll_amount, transaction_date, transaction_time) VALUES ('$vehicle_number', '$toll_amount', '$transaction_date', '$transaction_time')";
    if ($conn->query($sql) === TRUE) {
        echo "Transaction added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Transaction</title>
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

    <h2>Add Transaction</h2>
    <form method="post" action="">
        <label for="vehicle_number">Vehicle Number:</label>
        <input type="text" id="vehicle_number" name="vehicle_number" required>

        <label for="toll_amount">Toll Amount:</label>
        <input type="number" step="0.01" id="toll_amount" name="toll_amount" required>

        <label for="transaction_date">Transaction Date:</label>
        <input type="date" id="transaction_date" name="transaction_date" required>

        <label for="transaction_time">Transaction Time:</label>
        <input type="time" id="transaction_time" name="transaction_time" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
