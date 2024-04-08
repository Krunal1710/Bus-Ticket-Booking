<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Buses</title>
    <link rel="stylesheet" href="Booking1.css">
    <link rel="stylesheet" href="../Navbar/nav.css">
</head>

<body>
    <!-- NavBar -->
    <iframe class="nav" src="../Navbar/nav.html" frameborder="0" scrolling="no" width="100%" height="76px"></iframe>
    <!-- main part -->
    <div class="container">
        <h1>Available Buses</h1>
        <div class="bus-list">
            <?php
            // Connect to the database
            $db_host = "localhost"; // Enter your database host
            $db_user = "root"; // Enter your database username
            $db_pass = ""; // Enter your database password
            $db_name = "bus_reservation"; // Enter your database name

            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve values from URL parameters
            if(isset($_GET['source']) && isset($_GET['destination']) && isset($_GET['date'])) {
                $source = $_GET['source'];
                $destination = $_GET['destination'];
                $date = $_GET['date'];

                // Prepare SQL statement to fetch buses
                $sql = "SELECT * FROM buses WHERE source='$source' AND destination='$destination' AND date='$date'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display available buses
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='bus'>";
                        echo "<h2>{$row['bus_number']}</h2>";
                        echo "<p><strong>Departure:</strong> {$row['departure_time']}</p>";
                        echo "<p><strong>Arrival:</strong> {$row['arrival_time']}</p>";
                        echo "<p><strong>Class:</strong> {$row['bus_type']}</p>";
                        echo "<p><strong>Price:</strong> Rs. {$row['price']}</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No buses available for the selected route and date!!.</p>";
                }
            } else {
                echo "<p>Invalid parameters!!.</p>";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>

    <iframe class="footerbar" src="../Navbar/footer.html" frameborder="0" scrolling="no" width="100%" height="8vh"></iframe>
</body>

</html>
