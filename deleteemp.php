<?php
include_once 'config.php';

if (isset($_GET['id']))  
    $empID = $_GET['id'];

    $query = "DELETE FROM emp WHERE empID = $empID";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        header("location:manage.php");
    }



$conn->close();
?>
