<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bus_reservation";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $journey_date = $_POST["journey_date"];

    // Delete booking
    $sql = "DELETE FROM bookings WHERE email = '$email' AND bdate = '$journey_date'";
    $sql1 = "SELECT * FROM bookings WHERE email = '$email' AND bdate = '$journey_date'";
    $result = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
        if (mysqli_query($conn, $sql)) {
            echo "Booking deleted successfully!";
        }
    }
    else {
        echo "No bookings found for the given email and journey date.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Booking</title>
</head>
<body>
    <h2>Delete Booking</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Journey Date:</label><br>
        <input type="date" name="journey_date" required><br><br>
        <input type="submit" value="Delete Booking">
    </form>
</body>
</html>
