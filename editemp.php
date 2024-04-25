<?php
include_once 'manageheader.php';
include_once 'config.php';
$id = $_GET['id'];
if (isset($_POST['empUpdate'])) {
    $empname = $_POST['empname'];
    $emphone = $_POST['empphone'];
    $emptype = $_POST['emptype'];

    $query = "UPDATE emp SET empName='$empname', empPhone='$emphone', empType='$emptype' WHERE empID='$id';";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("location: manage.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<div class = "Welcome-Message">
    <h2 style="color:white; margin-top:20px;">Update Employee</h2>
</div>
<?php
$sql = "SELECT * FROM emp WHERE empID = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="registration-form">
    <form action="editemp.php?id=<?php echo $id; ?>" method="post">
        <label>Update Employee Name</label>
        <input type="text" name="empname" value="<?php echo $row['empName'] ?>">
        <label>Update Employee Phone Number</label>
        <input type="number" name="empphone" value="<?php echo $row['empPhone'] ?>">
        <label>Update Employee Type</label>
        <input type="text" name="emptype" value="<?php echo $row['empType'] ?>">
        <input type="submit" name="empUpdate" value="Submit Changes" class="submit">
    </form>
</div>
