<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Buses</title>
    <link rel="stylesheet" href="Booking1.css">
    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="icon" type="image/png" href="../Assets/images/bus-icon.png">
</head>

<body>
    <!-- NavBar -->
    <iframe class="nav" src="../Navbar/nav.html" frameborder="0" scrolling="no" width="100%" height="76px"></iframe>
    <!-- main part -->
    <div class="container">
        <h1>Available Buses</h1>
        <div class="bus-list">
            <?php
            session_start();
            // Connect to the database
            $db_host = "localhost"; 
            $db_user = "root"; 
            $db_pass = ""; 
            $db_name = "bus_reservation"; 

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
                $_SESSION['date'] = $date;
                // Prepare SQL statement to fetch buses
                $sql = "SELECT * FROM buses WHERE source='$source' AND destination='$destination'";
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
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='bus_number' value='{$row['bus_number']}'>";
                        echo "<button type='submit' name='book'>Book</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                    if (isset($_POST['book'])) {
                        // Get the bus number from the submitted form
                        $selected_bus_number = $_POST['bus_number'];
                        // Set the session variable
                        $_SESSION['selected_bus_number'] = $selected_bus_number;
                        // Redirect to a page where the user can complete the booking process
                        header("Location: Booking2.php");
                        exit;
                    }
                } else {
                    echo "<p>No buses available for the selected route and date!!.</p>";
                    echo '<p><button onclick="prev()" name="prev">Prev</button><p>';
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
    <script>
        function prev() {
            window.history.back();
        }
    </script>
</body>

</html>
