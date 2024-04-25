<?php
 include_once 'manageheader.php';
 include_once 'config.php';

 if(isset($_POST['empUpdate'])){
    $empname = $_POST['empname'];
    $emphone = $_POST['empphone'];
    $emptype = $_POST['emptype'];

    $query = "INSERT INTO `emp`(`empName`, `empPhone`, `empType`) VALUES ('$empname','$emphone','$emptype');";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        header("location:manage.php");
    }

 }

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
<div class = "Welcome-Message">
    <h2 style="color:white; margin-top:10px;">Add New Employee</h2>
</div>
    

<div class ="registration-form">
    <Form action="addemp.php" method="post">
        <lable>Add Employee Name</lable>
        <input type ="Text" name="empname" >
        <lable>Add Employee Phone Number</lable>
        <input type ="number" name="empphone">
        <lable>Add Employee Type</lable>
        <input type ="Text" name="emptype">
        <input type = "submit" name="empUpdate" value = "Submit Changes" class="submit">
    </form>
</div>


