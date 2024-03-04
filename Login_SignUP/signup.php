<?php
session_start();
include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  $result = mysqli_query($conn, $sql);

  if($result) {
    $_SESSION['login_user'] = $email;
    header("location: welcome.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
