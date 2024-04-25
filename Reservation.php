<?php
include 'config.php';

$UID = $_COOKIE['UID'];

$vehicleNo = $_POST['vehicleNo'];
$address = $_POST['address'];
$pickupDate = $_POST['pickupDate'];
$returnDate = $_POST['returnDate'];
$vehiceType = $_POST['vehiceType'];
$rentalType = $_POST['rentalType'];
$paymentType = $_POST['paymentType'];
// $username = $UID;

$query='insert into reservation(username,vehicleNo,address,pickupDate,returnDate,vehicleType,rentalType,paymentType) values(?,?,?,?,?,?,?,?)';

$stmt = $conn->prepare($query);

// $stmt->bind_param('sssssss',$fname,$lname,$email,$username,$password,$cpassword,$userType);
$stmt->bind_param('ssssssss',$UID,$vehicleNo,$address,$pickupDate,$returnDate,$vehiceType,$rentalType,$paymentType);

if($stmt->execute()){

    echo "<script>
            alert ('Reserved successfully'); window.location('./About Us.html');</script>";
}
else{

        echo 'Unsuccessfull...';
    }
?>