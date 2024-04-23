<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="view_ticket.css">
    <link rel="icon" type="image/png" href="../Assets/images/bus-icon.png">
</head>

<body>
    <!-- NavBar -->
    <iframe class="nav" src="../Navbar/nav.html" frameborder="0" scrolling="no" width="100%" height="76px"></iframe>
    <!-- main part -->
    <div class="maincontainer">
        <?php
        $conn = new mysqli("localhost", "root", "", "bus_reservation");
        session_start();
        $email = $_SESSION['login_user'];
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM bookings WHERE email='$email' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>Ticket Details</h2>";
            echo "<p>Passenger Name: " . $row['pname'] . "</p>";
            echo "<p>Email: " . $row['email'] . "</p>";
            echo "<p>Bus Number: " . $row['bus_number'] . "</p>";
            echo "<p>Seat Number: " . $row['seat'] . "</p>";
            echo "<p>Journey Date: " . $row['bdate'] . "</p>";
            echo "<p>Age: " . $row['age'] . "</p>";
            echo "<p>Contact Number: " . $row['contact'] . "</p>";  
            echo "<p>Gender: " . $row['gender'] . "</p>";
            echo '<button type="button" class="button" onclick="printTicket()">Print Ticket</button>';
            echo '<button class="button" onclick="redirectToHome()">Home</button>';
        } else {
            echo "<script>alert('No Bookings Found!!');</script>";
            echo "<script>window.location.href = '../Home/home.html';</script>";
        }

        $conn->close();
        ?>
    </div>
    <iframe class="footerbar" src="../Navbar/footer.html" frameborder="0" scrolling="no" width="100%" height="8vh"></iframe>
    <script>
        function redirectToHome() {
            window.location.href = '../Home/home.html';
        }
        function printTicket() {
            // Open printTicket.php in a new tab
            window.open('printTicket.php', '_blank');
        }
    </script>
</body>

</html>
