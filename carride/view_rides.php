<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "car_ride_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch rides from the database
$sql = "SELECT rides.id, rides.driver_id, rides.car_details, rides.starting_point, rides.destination, rides.departure_time, rides.available_seats
        FROM rides
        ORDER BY rides.departure_time ASC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Rides</title>
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

    <h2>Available Rides</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Car Details</th>
            <th>Starting Point</th>
            <th>Destination</th>
            <th>Departure Time</th>
            <th>Available Seats</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['car_details'] . "</td>";
                echo "<td>" . $row['starting_point'] . "</td>";
                echo "<td>" . $row['destination'] . "</td>";
                echo "<td>" . date('Y-m-d H:i:s', strtotime($row['departure_time'])) . "</td>";
                echo "<td>" . $row['available_seats'] . "</td>";
                echo "<td>";
                echo "<a href='delete_ride.php?id=" . $row['id'] . "'>Delete</a> ";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No rides found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
