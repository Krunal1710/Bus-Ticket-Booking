<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Ticket</title>
    <link rel="stylesheet" href="printTicket.css">
    <link rel="icon" type="image/png" href="../Assets/images/bus-icon.png">
</head>

<body>
    <div class="ticket-container">
        <div class="title"> 
            <img src="../Assets/images/bus-icon.png" alt="logo">
            <h1>ABC Travels</h1>
        </div>
        <div class="ticket">
            <?php
            $conn = new mysqli("localhost", "root", "", "bus_reservation");
            session_start();
            $email = $_SESSION['login_user'];
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM bookings WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<h2>Ticket Details</h2>";
                    echo "<p>Passenger Name: " . $row['pname'] . "</p>";
                    echo "<p>Email: " . $row['email'] . "</p>";
                    echo "<p>Bus Number: " . $row['bus_number'] . "</p>";
                    echo "<p>Seat Number: " . $row['seat'] . "</p>";
                    echo "<p>Journey Date: " . $row['bdate'] . "</p>";
                    echo "<p>Age: " . $row['age'] . "</p>";
                    echo "<p>Contact Number: " . $row['contact'] . "</p>";  
                    echo "<p>Gender: " . $row['gender'] . "</p>";
                }
            } 
            $conn->close();
            ?>
        </div>
        <div class="last"><h2>---- Happy Journey ----</h2></div>
    </div>

    <script>
        // Function to print the ticket when the page loads
        window.onload = function () {
            window.print();
            // Redirect to the previous page after printing
            window.history.back();
        };
    </script>
</body>

</html>
