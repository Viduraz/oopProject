<?php
// File to establish a database connection
include 'config.php';
// Retrive user ID
$UID = $_COOKIE['UID'];
// Retrieve data from the form submited via POST method
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert the contact info to table
$query='insert into contact(username,fullname,email,message) values(?,?,?,?)';

$stmt = $conn->prepare($query);
// Bind values
$stmt->bind_param('ssss',$UID,$name,$email,$message);

if($stmt->execute()){

    echo "<script>
        alert ('Your Question Recived. We will contact you soon'); 
        window.location='login.php';
        </script>.";
    }
    else{

        echo 'Unsuccessfull...';
    }
?>