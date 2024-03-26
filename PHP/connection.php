<?php
$conn = mysqli_connect("localhost", "root", "", "bus_reservation");

if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
