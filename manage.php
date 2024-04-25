<?php
 include_once 'manageheader.php'
?>

<div class="Welcome-Message">
<h1> Welcome Manager </h1>
</div>


<table>
    <caption>Current Employees</caption>
<tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>Phone No</th>
    <th>Employee Type</th>
    <th>Edit</th>
    <th>Delete</th> 
</tr>
<?php
include_once 'config.php';

$sql = "SELECT * FROM emp";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["empID"] . "</td>";
            echo "<td>" . $row["empName"] . "</td>";
            echo "<td>" . $row["empPhone"] . "</td>";
            echo "<td>" . $row["empType"] . "</td>";
            echo '<td><a href="editemp.php?id='.$row['empID']. '"> <input type="button" value="Edit" class="edit"></a> </td>';
            echo '<td> <a href="deleteemp.php?id='.$row['empID']. '"><input type="button" value="Delete" name="Delete" class="delete"> </td>';
            echo "</tr>";
        }
        $conn->close();
        ?>

</table>