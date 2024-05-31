<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "car_ride_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $driver_id = $_POST['driver_id'];
    $car_details = $_POST['car_details'];
    $starting_point = $_POST['starting_point'];
    $destination = $_POST['destination'];
    $departure_time = date('Y-m-d H:i:s', strtotime($_POST['departure_time']));
    $available_seats = $_POST['available_seats'];

    // Insert the ride information into the database
    $sql = "INSERT INTO rides (driver_id, car_details, starting_point, destination, departure_time, available_seats)
            VALUES ('$driver_id', '$car_details', '$starting_point', '$destination', '$departure_time', '$available_seats')";
    if ($conn->query($sql) === TRUE) {
        echo "Ride added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Ride</title>
    <!-- Link to CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="add_ride.php">Add Ride</a></li>
            <li><a href="view_rides.php">View Rides</a></li>
        </ul>
    </nav>

    <h2>Add Ride</h2>
    <form method="post" action="">
        <label for="driver_id">Driver ID:</label>
        <input type="number" id="driver_id" name="driver_id" required>

        <label for="car_details">Car Details:</label>
        <input type="text" id="car_details" name="car_details" required>

        <label for="starting_point">Starting Point:</label>
        <input type="text" id="starting_point" name="starting_point" required>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>

        <label for="departure_time">Departure Time:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" required>

        <label for="available_seats">Available Seats:</label>
        <input type="number" id="available_seats" name="available_seats" required>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
