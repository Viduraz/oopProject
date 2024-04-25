
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="stylesheet" href="SCRIPTS/CSS/Header and Footer.css">
    <link rel="stylesheet" href="SCRIPTS/CSS/ContactUS.css">

</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="./Dashboard.php"><img src="SRC/logo.png"></a> </div>
            <ul>
                    <li><a href="Index.php" target="_self">Home</a></li>
                    <li><a href="cars.html" target="_self">Cars</a></li>
                    <li><a href="Login.php" target="_self">Reservations</a></li>
                    <li><a href="Login.html" target="_self">Contact</a></li>
            </ul>
        </nav>
    </header>
    <br>
<!-- --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    
    <div class="contact-form">
        <h2>Feedback</h2>
        <form action="./feedbackk.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" "required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" " required></textarea>

            <input type="submit" value="Submit" name="cnfirmchnges">
        </form>
        
    </div>
</div>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <footer>
        <section class="contact">
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to contact us.</p>
            <!-- <a href="Contact Us.html" class="cta-button">Contact Us</a> -->
        </section>
        <p>CarVoyage Rentals</p>
    </footer>

</body>
</html>

