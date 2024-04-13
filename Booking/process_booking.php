<?php
session_start();
// Step 1: Connect to your database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bus_reservation";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve booking details from the form
$pname = $_POST['pname'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$seat = $_POST['seat'];
$gender = $_POST['gender'];
if ($seat < 1 || $seat > 45) {
    // Seat is already booked, show an alert
    echo "<script>alert('Please, Enter a seat number between 1 to 45');</script>";
    // Redirect back to the booking page
    echo "<script>window.location.href = 'Booking2.php';</script>";
    exit();
}

$date= $_SESSION['date'];
// Step 3: Check if the seat selected is already booked
$sql_check_seat = "SELECT * FROM bookings WHERE seat = '$seat' AND bdate='$date'";
$result_check_seat = $conn->query($sql_check_seat);
if ($result_check_seat->num_rows > 0) {
    // Seat is already booked, show an alert
    echo "<script>alert('Sorry, the seat number $seat is already booked. Please Enter another seat.');</script>";
    // Redirect back to the booking page
    echo "<script>window.location.href = 'Booking2.php';</script>";
    exit();
}

// Step 4: Insert booking details into a new table in the database
$email = $_SESSION['login_user'];
$selected_bus_number=$_SESSION['selected_bus_number'];
$sql_insert_booking = "INSERT INTO bookings (email, bus_number,bdate,pname, age, contact, seat, gender) VALUES ('$email','$selected_bus_number','$date','$pname', '$age', '$contact', '$seat', '$gender')";
mysqli_query($conn,$sql_insert_booking);
echo "<script>window.location.href = 'Booking3.php';</script>";
// Step 5: Close the database connection
$conn->close();
?>
