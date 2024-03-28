<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root";
$password = ""; 
$database = "bus_reservation";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $country = $_POST['country'];
    $subject = $_POST['subject'];

    // Prepare SQL statement
    $sql = "INSERT INTO contact_us (firstname, lastname, country, subject) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstname, $lastname, $country, $subject);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<h2>Thank you for contacting us, $firstname $lastname!</h2>";
        echo "<p>We have received your message and stored it in our database.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
