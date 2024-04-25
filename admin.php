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

    if($username!='admin') {
        echo('<script>window.location="Index.php";</script>');
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                    <!-- <li><a href="Login.php" target="_self">Reservations</a></li>
                    <li><a href="Login.html" target="_self">Contact</a></li> -->
                    <a href="Index.php" class="Login-button" id="logoutBtn">Logout</a>
            </ul>
        </nav>
    </header><br><br>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <section class="Welcome-Message"><br><br>
        <h1>Admin Navigation</h1>
        <a href="./manage.php" class="cta-button">Manage Employees</a>
        <a href="./usermanage.php" class="cta-button">Manage Users</a>
        <a href="./feedbackmanage.php" class="cta-button">Feedbacks</a>
    </section>
    <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------     -->
    <br><br><footer>
            <section class="contact">
                <p>If you have any questions, feel free to contact us.</p>
                <a href="Contact Us.html" class="cta-button">Contact Us</a>
            </section>
            <p>CarVoyage Rentals</p>
</footer>

<script>
    document.getElementById("logoutBtn").addEventListener('click', function (){
    document.cookie = 'UID' +'=username; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    window.location='userdboard.php';});
</script>

</body>
</html>