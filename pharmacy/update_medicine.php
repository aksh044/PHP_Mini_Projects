<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "pharmacy_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the medicine ID from the URL
$id = $_GET['id'];

// Fetch the medicine details from the database
$sql = "SELECT name, category, quantity, price FROM medicines WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $category = $row['category'];
    $quantity = $row['quantity'];
    $price = $row['price'];
} else {
    echo "Medicine not found.";
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Update the medicine in the database
    $sql = "UPDATE medicines SET name = '$name', category = '$category', quantity = '$quantity', price = '$price' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Medicine updated successfully!";
        header("Location: view_medicines.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Medicine</title>
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

    <h2>Update Medicine</h2>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo $category; ?>" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" value="<?php echo $price; ?>" required>

        <input type="submit" value="Update">
    </form>
</body>
</html>
