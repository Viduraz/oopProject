<?php
include_once 'config.php';

if (isset($_GET['id']))  
    $userID = $_GET['id'];

    $query = "DELETE FROM feeback WHERE userID = $userID";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        header("location:usermanage.php");
    }



$conn->close();
?>
