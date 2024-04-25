<?php
 include_once 'userheader.php'
//  $UID = $_COOKIE['UID'];
?>

<div class="Welcome-Message">
<h1> Welcome </h1>
</div>


<table>
    <caption>Feedbacks</caption>
<tr>
    <th>User Id</th>
    <th>Name</th>
    <th>Feedback</th> 
    <th>Delete Feedback</th> 
</tr>

<?php
    include_once 'config.php';

    $sql = "SELECT * FROM feeback";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                $ID = $row['ID'];
                $username=$row["username"];
                echo "<td>" .$row["username"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["message"] . "</td>";
                echo "<td><button type ='submit' class='delete' onclick='location.href = \"feedbackmanage.php?delAcc=".$row['ID']."\";'>Delete</td>";
            }
?>

            
<?php
if(isset($_GET['delAcc'])){

    $sql = "DELETE FROM feeback WHERE username = '".$username."'";
    $result = mysqli_query($conn, $sql);

}
?>