<?php 
    include 'config.php';

    $userType = ""  ;

    $sql = "SELECT * FROM register WHERE username = '".$UID."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $userType = $row['userType'];
    }
    }
?>