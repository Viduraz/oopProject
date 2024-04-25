<?php
include_once 'userheader.php';
include_once 'config.php';
$id = $_GET['id'];
if (isset($_POST['userUpdate'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Telephone = $_POST['Telephone'];
    $address = $_POST['address'];
    $userType = $_POST['userType'];

    $query = "UPDATE `register` SET `fname`='$fname',`lname`='$lname',`email`='$email',
    `username`='$username',`password`='$password',`Telephone`='$Telephone',`address`='$address',`userType`='$userType' WHERE `userID`='$id' ;";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("location: usermanage.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<div class = "Welcome-Message">
    <h2 style="color:white; margin-top:20px;">Update User</h2>
</div>
<?php
$sql = "SELECT * FROM register WHERE UserID = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="registration-form">
    <form action="useredit.php?id=<?php echo $id; ?>" method="post">
        <label>Update User First Name</label>
        <input type="text" name="fname" value="<?php echo $row['fname'] ?>">
        <label>Update User Last Name</label>
        <input type="text" name="lname" value="<?php echo $row['lname'] ?>">
        <label>Update User email</label>
        <input type="email" name="email" value="<?php echo $row['email'] ?>">
        <label>Update UserName</label>
        <input type="text" name="username" value="<?php echo $row['username'] ?>"><br><br>
        <label>Update password</label>
        <input type="password" name="password" value="<?php echo $row['password'] ?>"><br><br>
        <label>Update Employee Phone Number</label>
        <input type="text" name="Telephone" value="<?php echo $row['Telephone'] ?>">
        <label>Update Address</label>
        <input type="text" name="address" value="<?php echo $row['address'] ?>">
        <label>Update User Type</label>
        <input type="text" name="userType" value="<?php echo $row['userType'] ?>">
        <input type="submit" name="userUpdate" value="Submit Changes" class="submit">
    </form>
</div>
