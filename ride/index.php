<?php
include 'config.php';

if(isset($_POST['submit'])) {
    $driver_name = mysqli_real_escape_string($con, $_POST['driver_name']);
    $start_location = mysqli_real_escape_string($con, $_POST['start_location']);
    $destination = mysqli_real_escape_string($con, $_POST['destination']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);

    $insertquery = "INSERT INTO car_ride (driver_name, start_location, destination, date, time) VALUES ('$driver_name', '$start_location', '$destination', '$date', '$time')";
    $iquery = mysqli_query($con, $insertquery);

    if($iquery) {
        ?>
        <script>alert("Car ride information submitted successfully");</script>
        <?php
    } else {
        ?>
        <script>alert("Failed to submit car ride information");</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Ride Management System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Car Ride Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/signup/contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/signup/regis.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Car Ride Information Submission</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="driver_name">Driver's Name:</label>
                        <input type="text" class="form-control" id="driver_name" name="driver_name" required>
                    </div>
                    <div class="form-group">
                        <label for="start_location">Start Location:</label>
                        <input type="text" class="form-control" id="start_location" name="start_location" required>
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination:</label>
                        <input type="text" class="form-control" id="destination" name="destination" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time:</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit Car Ride Information</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>