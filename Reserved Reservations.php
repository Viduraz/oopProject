<?php 
    include 'config.php';

    $UID = $_COOKIE['UID'];

    $vehicleNo = "";
    $address = "";
    $pickupDate = "";
    $returnDate = "";
    $vehicleType = "";
    $rentalType = "";
    $paymentType = "";
    $destination = "";
    $distance = "";
 
    $sql = "SELECT * FROM reservation WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $vehicleNo = $row["vehicleNo"];
        $address = $row["address"];
        $pickupDate = $row["pickupDate"];
        $returnDate = $row["returnDate"];
        $vehicleType =$row["vehicleType"];
        $rentalType = $row["rentalType"];
        $paymentType = $row["paymentType"];
        $destination = $row["destination"];
        $distance = $row["distance"];

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="SCRIPTS/CSS/Header and Footer.css">
    <link rel="stylesheet" href="./SCRIPTS/CSS/Dashboard.css">
    <link rel="stylesheet" href="./SCRIPTS/CSS/user.css">
    <link rel="stylesheet" href="./SCRIPTS/CSS/Reservation.css">
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
    </header><br><br><br><br>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <section class="container">
        <h2>Reservation Details</h2><br>
    <form method="POST" action="./Reserved Reservations.php">
        <input style="display: none;" type="text" id="vno" name="vnonew" value = "<?php echo $vehicleNo;?>"><br>
        VehicleNo: <input type="text" id="vno" name="vno" value = "<?php echo $vehicleNo;?>" disabled><br>
        Location:<input type="text" id="location" name="location" value = "<?php echo $address;?>" ><br>
        Pickup Date:<input type="text" id="pdate" name="pdate" value = "<?php echo $pickupDate;?>" ><br>
        Return Date:<input type="text" id="rdate" name="rdate" value = "<?php echo $returnDate;?>" >
        Car Type:<input type="text" id="ctype" name="ctype" value = "<?php echo $vehicleType;?>" ><br>
        Rental Type:<input type="text" id="rtype" name="rtype" value = "<?php echo $rentalType;?>" ><br>
        Payment:<input type="text" id="ptype" name="ptype" value = "<?php echo $paymentType;?>" ><br>
    <div>
        <h4>Add Aditional Details</h4>
        Destination : <input type="text" id="destination" name="destination" value = "<?php echo $destination;?>"><br>
        Distance:<input type="text" id="distance" name="distance" value = "<?php echo $distance;?>"><br>
        <input type="submit" id="cnfirmchngest" value="confirm" name="cnfirmchnges"class="btn">
        <input type="submit" id="delete" value="Delete Reservation" name="delAcc" class="delbtn"><br>
    </div>
</form>

</section><br>

    <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------     -->
    <footer>
            <section class="contact">
                <h2>Contact Us</h2>
                <p>If you have any questions, feel free to contact us.</p>
                <a href="Contact Us.html" class="cta-button">Contact Us</a>
            </section>
            <p>CarVoyage Rentals</p>
        </footer>

</body>
</html> 

<?php

$UID = $_COOKIE['UID'];

if(isset($_POST['delAcc'])){

    $sql = "DELETE FROM reservation WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if($result){

        echo('<script>window.location="Index.php";
                    alert("Your Reservation successfully...");</script>');
    }
}

if (isset($_POST['vnonew'])AND isset($_POST['location'])AND isset($_POST['pdate'])AND isset($_POST['rdate'])AND isset($_POST['ctype'])AND isset($_POST['rtype'])AND isset($_POST['ptype'])AND isset($_POST['destination'])AND isset($_POST['distance'])AND isset($_POST['cnfirmchnges']) ) {
        $vehicleNo = $_POST['vnonew'];
        $vehicleNoNew = $_POST['vno'];
        $location = $_POST['location'];
        $pickupDate = $_POST['pdate'];
        $returnDate = $_POST['rdate'];
        $vehicleType = $_POST['ctype'];
        $rentalType = $_POST['rtype'];
        $paymentType = $_POST['ptype'];
        $destination = $_POST["destination"];
        $distance = $_POST["distance"];

    $sql = "UPDATE reservation SET address = '".$location."',  pickupDate = '".$pickupDate."',  returnDate = '".$location."',  vehicleType = '".$vehicleType."',  rentalType = '".$rentalType."',  paymentType = '".$paymentType."', destination = '".$destination."', distance = '".$distance."' WHERE username = '".$UID."'";
    if(mysqli_query($conn, $sql)){
        echo('Success');
        echo('<script>window.location="./Reserved Reservations.php"; alert("Your reservation updated successfully..."); </script>');
    }
    else {
    echo('Failed');
    }

}

?>