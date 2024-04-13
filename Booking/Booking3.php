<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Travels | Payment Page</title>
    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="../Booking/Booking3.css">
    <link rel="icon" type="image/png" href="../Assets/images/bus-icon.png">
</head>

<body>
    <!-- NavBar -->
    <iframe class="nav" src="../Navbar/nav.html" frameborder="0" scrolling="no" width="100%" height="76px"></iframe>
    <!-- main part -->
    <div class="maincontainer">
        <h2>Payment Page</h2>
        <form action="Booking4.php" method=""post>
            <label for="cardnumber">Enter Card Number :</label>
            <input type="number" name="cardnumber" id="cardnumber" required><br><br>
            <label for="expiry">Expiry Date :</label>
            <input type="number" name="expiry" id="expiry" required><br><br>
            <label for="CVV">CVV :</label>
            <input type="number" name="CVV" id="CVV" required><br><br>
            <input type="submit" class="button" value="Confirm Payment">
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