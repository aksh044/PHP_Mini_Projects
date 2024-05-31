<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "pharmacy_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Insert the medicine into the database
    $sql = "INSERT INTO medicines (name, category, quantity, price) VALUES ('$name', '$category', '$quantity', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "Medicine added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Medicine</title>
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

    <h2>Add Medicine</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
