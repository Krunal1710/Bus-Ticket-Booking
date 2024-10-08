<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Travels | Passenger_Details</title>
    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="../Booking/Booking2.css">
    <link rel="icon" type="image/png" href="../Assets/images/bus-icon.png">
</head>

<body>
    <!-- NavBar -->
    <iframe class="nav" src="../Navbar/nav.html" frameborder="0" scrolling="no" width="100%" height="76px"></iframe>
    <!-- main part -->
    <div class="maincontainer">
        <h2>Passenger Details</h2>
        <form action="process_booking.php" method="post">
            <label for="pname">Passenger Name :</label>
            <input type="text" name="pname" id="pname" required><br><br>
            <label for="age">Age :</label>
            <input type="number" name="age" id="age" required><br><br>
            <label for="contact">Contact No. :</label>
            <input type="number" name="contact" id="contact" required><br><br>
            <img src="../Assets/images/seat-layout.jpg" alt="seat-layout img"><br><br>
            <label for="seat">Enter Seat Number(1-45) :</label>
            <input type="number" name="seat" id="seat" required><br><br>
            <label for="gender">Gender :</label>
            <input type="radio" name="gender" id="Male" value="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="Female" value="female">
            <label for="Female">Female</label><br><br>
            <input type="button" onclick="prev()" class="button" value="Prev">
            <input type="submit" class="button" value="Payment" name="payment_submit">
        </form>
    </div>
    <iframe class="footerbar" src="../Navbar/footer.html" frameborder="0" scrolling="no" width="100%"
        height="8vh"></iframe>
    <script>
        function prev() {
            window.history.back();
        }
    </script>
</body>

</html>