<?php
include 'config.php';
$UID = $_COOKIE['UID'];

$name = $_POST['name'];
$message = $_POST['message'];


$query='insert into feeback(username,name,message) values(?,?,?)';

$stmt = $conn->prepare($query);

$stmt->bind_param('sss',$UID,$name,$message);

if($stmt->execute()){

    echo "<script>
        alert ('Your feedback Recived.'); 
        window.location='login.php';
        </script>.";
    }
    else{

        echo 'Unsuccessfull...';
    }
?>