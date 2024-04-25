<?php 
    include 'config.php';

    $UID = $_COOKIE['UID'];

    $name = "";
    $message = "";

    $sql = "SELECT * FROM feeback WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $name = $row["name"];
        $message = $row['message'];
    }
}
?>
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
        <form action="./feedbackupdate.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo "$name"; ?>"required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" " required><?php echo "$message"; ?></textarea>

            <input type="submit" value="Update" name="cnfirmchnges">
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

<?php


$UID = $_COOKIE['UID'];

if (isset($_POST['name']) AND isset($_POST['message'])AND isset($_POST['cnfirmchnges']) ) {

    $fullname = $_POST['name'];
    $message = $_POST['message'];

    $sql = "UPDATE feeback SET username = '".$UID."',name = '".$fullname."', message = '".$message."' WHERE username = '".$UID."'";
    if(mysqli_query($conn, $sql)){
        echo('Success');
        echo('<script>window.location="./feedbackupdate.php"; alert("Your question updated successfully..."); </script>');
    }
    else {
    echo('Failed');
    }

}
?>


