<?php 
    include 'config.php';

    $UID = $_COOKIE['UID'];

    $fname = "";
    $laname = "";
    $email = "";
    $username = "";
    $tel = "";
    $address = "";

    $sql = "SELECT * FROM register WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $fname = $row["fname"];
        $lname = $row["lname"];
        $email = $row['email'];
        $username = $row['username'];
        $tel = $row['Telephone'];
        $address = $row['address'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="SCRIPTS/CSS/Header and Footer.css">
    <link rel="stylesheet" href="SCRIPTS/CSS/Dashboard.css">
    <link rel="stylesheet" href="./SCRIPTS/CSS/Reservation.css">
    <link rel="stylesheet" href="./SCRIPTS/CSS/user.css">
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
                    <a href="Index.php" class="Login-button" id="logoutBtn">Logout</a>
            </ul>
        </nav>
    </header><br><br><br><br><br>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <section class="container">
        <h2>User Details</h2><br>
    <form method="POST" action="User.php">
        First Name: <input type="text" id="fname" name="fname" value = "<?php echo $fname;?>"><br>
        Last Name:<input type="text" id="lname" name="lname" value = "<?php echo $lname;?>"><br>
        Email:<input type="text" id="email" name="email" value = "<?php echo $email;?>"><br>
        Username:<input type="text" id="username" name="username" value = "<?php echo $username;?>" disabled>
    
    <div>
        <h4>Add Aditional Details</h4>
        Address : <input type="text" id="address" name="address" value = "<?php echo $address;?>"><br>
        Phonenumber:<input type="tel" id="tel" name="tel" value = "<?php echo $tel;?>"><br>
        <input type="submit" id="cnfirmchngest" value="confirm" name="cnfirmchnges"class="btn">

    </div>

    <div>
    <h4>Change Password</h4>
    
        Enter the Old Password: <input type="password" id="Opw" name="oldPass"><br>
        Enter the New Password: <input type="password" id="npw" name="nwpass"><br>
        Confirm the New Password: <input type="password" id="cnpw" name="cpass"><br>
        <input type="submit" id="cngpw" value="Change Password" name="cngpw" class="btn">
        <input type="submit" id="delete" value="Delete Account" name="delAcc" class="delbtn"><br>
    </form>
    </div>
    </div>
    </section>
    <!-- -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------     -->
    <br>
    <footer>
            <section class="contact">
                <h2>Contact Us</h2>
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

<?php
if(isset($_POST['delAcc'])){

    $sql = "DELETE FROM register WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if($result){

        echo('<script>window.location="Index.php";
                    alert("Your account deleted successfully...");
                    document.cookie = "UID" +"=username; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;"; </script>');
    }
}

if (isset($_POST['fname']) AND isset($_POST['lname'])AND isset($_POST['email'])AND isset($_POST['tel'])AND isset($_POST['address'])AND isset($_POST['cnfirmchnges']) ) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];

    $sql = "UPDATE register SET fname = '".$fname."', lname = '".$lname."', email = '".$email."', Telephone = '".$tel."', address = '".$address."' WHERE username = '".$UID."'";
    if(mysqli_query($conn, $sql)){
        echo('Success');
        echo('<script>window.location="User.php"; alert("Your profile updated successfully..."); </script>');
    }
    else {
    echo('Failed');
    }

}

if(isset($_POST['oldPass']) AND isset($_POST['nwpass']) AND isset($_POST['cpass']) AND isset($_POST['cngpw'])){
    $oldPass = $_POST['oldPass'];
    $nwpass = $_POST['nwpass'];
    $cpass = $_POST['cpass'];

    if($nwpass != $cpass){
        echo('<Script>alert("New password and Confirm password dose not match...")</script>');
    }
    else{

        $sql2 = "SELECT password FROM register WHERE userName = '".$UID."'";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
        while($row = mysqli_fetch_assoc($result2)) {
            $oldPassword =  $row["password"];

            if ($oldPassword == $oldPass) {
                $sql = "UPDATE register SET password = '".$nwpass."' WHERE username = '".$UID."'";
                if(mysqli_query($conn, $sql)){
                    echo('Success');
                    echo('<script>window.location="Index.php";
                            alert("Your password updated successfully...");
                    </script>');
                }
            }else {
            echo('<script>alert("Old password dose not match...");</script>');
            }
        }
        }
    }
}
?>

