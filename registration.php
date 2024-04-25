<?php
include 'config.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$username= $_POST['Un'];
$password = $_POST['pw'];
$cpassword = $_POST['cpw'];
$userType = 'user';

if($password==$cpassword)
    {
    $query='insert into register(fname,lname,email,username,password,cpassword,userType) values(?,?,?,?,?,?,?)';

    $stmt = $conn->prepare($query);

    $stmt->bind_param('sssssss',$fname,$lname,$email,$username,$password,$cpassword,$userType);

    if($stmt->execute()){

        echo "<script>
                alert ('Thank you for registering. Now you can Login'); 
                window.location='login.php';
            </script>.";
    }
    else{

        echo 'Unsuccessfull...';
    }
    }
else{
    echo '<script>alert("Password and Confirm password dose not match...");
    window.location="Register.html"</script>';
}
?>