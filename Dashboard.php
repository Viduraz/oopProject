<?php 
    include 'config.php';

    $UID = $_COOKIE['UID'];

    $fullname = "";
    $email = "";
    $message = "";

    $sql = "SELECT * FROM contact WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $fullname = $row["fullname"];
        $email = $row["email"];
        $message = $row['message'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="SCRIPTS/CSS/Header and Footer.css">
    <link rel="stylesheet" href="SCRIPTS/CSS/Dashboard.css">
    
    <link rel="stylesheet" href="SCRIPTS/CSS/HomeStyle.css">
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
                    <a href="User.php" class="Login-button">User Profile</a>
                    <?php 
                            include 'config.php';

                            $UID = $_COOKIE['UID'];

                            $username = "";

                            $sql = "SELECT * FROM register WHERE username = '".$UID."'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $username = $row['username'];
                            }
                            }

                            if($username=='admin') {
                                echo('<a href="./admin.php" class="Login-button">Admin Pannel</a>');
                            
                        }
                        ?>
                    <a href="Index.php" class="Login-button" id="logoutBtn">Logout</a>
            </ul>
        </nav>
    </header>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<section class="Welcome-Message"><br><br>
        <h1>Explore the World with Our Cars</h1>
        <p>Rent a car for your journey today.</p>
        <a href="Reservations.html" class="cta-button">Book Now</a>
        <a href="./Reserved Reservations.php" class="cta-button">Your Reservation</a>
        <a href="./questions.php" class="cta-button">Previous Questions</a>
        <a href="./feedback.php" class="cta-button">Add Feedback</a>
        <a href="./feedbackupdate.php" class="cta-button">Feedback Manage</a>
        

        
    </section>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <footer>
            <section class="contact">
                <h2>Contact Us</h2>
                <p>If you have any questions, feel free to contact us.</p>
                <a href="Contact Us.html" class="cta-button">Contact Us</a>
            </section>
            <!-- <p>CarVoyage Rentals</p> -->
        </footer>
<script>
    document.getElementById("logoutBtn").addEventListener('click', function (){
    document.cookie = 'UID' +'=username; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    window.location='userdboard.php';});
</script>

</body>
</html>