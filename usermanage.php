<?php
 include_once 'userheader.php'
?>

<div class="Welcome-Message">
<h1> Welcome </h1>
</div>


<table>
    <caption>Users</caption>
<tr>
    <th>User ID</th>
    <th>Fisrt Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Telephone</th>
    <th>Address</th>
    <th>User Type</th>
    <th>Edit</th>
    <th>Delete</th> 
</tr>
<?php
include_once 'config.php';

$sql = "SELECT * FROM register";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["UserID"] . "</td>";
            echo "<td>" . $row["fname"] . "</td>";
            echo "<td>" . $row["lname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["Telephone"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["userType"] . "</td>";
            echo '<td><a href="useredit.php?id='.$row['UserID']. '"> <input type="button" value="Edit" class="edit"></a> </td>';
            echo '<td> <a href="userdelete.php?id='.$row['UserID']. '"><input type="button" value="Delete" name="Delete" class="delete"> </td>';
            echo "</tr>";
        }
        $conn->close();
        ?>

</table>