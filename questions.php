<?php 
    include 'config.php';

    $UID = $_COOKIE['UID'];

    $fullname = "";
    $email = "";
    $message = "";
// Retrieve info from database
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
    <!-- Contact form -->
    <div class="contact-form">
        <h2>Contact Us</h2>
        <form action="./questions.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="fullname" value = "<?php echo "$fullname"?>" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" value = "<?php echo "$email"?>" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required><?php echo "$message"?></textarea>

            <input type="submit" value="Change Question" name="cnfirmchnges">
            <input type="submit" value="Delete Question" name="delAcc" style="background-color:red;">
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
// Handle the form submissions
if(isset($_POST['delAcc'])){
    // Delete
    $sql = "DELETE FROM contact WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if($result){

        echo('<script>window.location="Dashboard.php";
                    alert("Your Question deleted successfully..."); </script>');
    }
}

$UID = $_COOKIE['UID'];

if (isset($_POST['fullname']) AND isset($_POST['email'])AND isset($_POST['message'])AND isset($_POST['cnfirmchnges']) ) {
    // Update
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "UPDATE contact SET username = '".$UID."',fullname = '".$fullname."', email = '".$email."', message = '".$message."' WHERE username = '".$UID."'";
    if(mysqli_query($conn, $sql)){
        echo('Success');
        echo('<script>window.location="./questions.php"; alert("Your question updated successfully..."); </script>');
    }
    else {
    echo('Failed');
    }

}
?>

