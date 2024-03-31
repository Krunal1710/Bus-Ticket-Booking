<?php
session_start();
include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT email FROM users WHERE email = '$email' and password = '$password'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  if($count == 1) {
    $_SESSION['login_user'] = $email;
    header("location: ../Home/home.html");
  } else {
    echo '<script>alert("Your Login Name or Password is invalid");</script>';
  }
}
?>
