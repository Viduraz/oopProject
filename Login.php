<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="SCRIPTS/CSS/HomeStyle.css">
    <link rel="stylesheet" href="SCRIPTS/CSS/Header and Footer.css">
    <link rel="stylesheet" href="SCRIPTS/CSS/Login and register.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo"><a href="./Dashboard.php"><img src="SRC/logo.png"></a> </div>
            <ul>
                    <li><a href="Index.php" target="_self">Home</a></li>
                    <li><a href="cars.html" target="_self">Cars</a></li>
                    <li><a href="Login.php" target="_self">Reservations</a></li>
                    <li><a href="Login.html" target="_self">Contact</a></li>
                <!-- <a href="Login.php" class="Login-button">Sign-In</a>
                <a href="Register.html" class="Login-button">Sign-Up</a> -->
            </ul>
        </nav>
    </header>
    <!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    
    <div class="login-page" id="Login">
        <div class="form">
            <form class="login-form" method="POST" action="Login.php">
            <input type="text" placeholder="Username" name="Un">
            <input type="password" placeholder="Password" name="Pw">
            <button class="cta-button">Sign In</button>
        <p class="message">Not registered? <a href="Register.html" >Create an account</a></p>
            </form>
        </div>
    </div>
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
  <footer>
            <section class="contact">
                <h2>Contact Us</h2>
                <p>If you have any questions, feel free to contact us.</p>
                <a href="Contact Us.html" class="cta-button">Contact Us</a>
            </section>
            <!-- <p>CarVoyage Rentals</p> -->
        </footer>
</body>
<script  src="SCRIPTS/JS/Login and Register.js"></script>

</body>
</html>

<?php


if(isset($_COOKIE['UID'])) {
    echo('<script>window.location="Dashboard.php"</script>');
}


    if (count($_POST) > 0) {
        include 'config.php';

    $username = $_POST['Un'];
    $password = $_POST['Pw'];

    $query = "select * from register where userName = ?";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("s",$username);
    $stmt->execute();

    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){

        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password){

            setcookie('UID', $username, time() + (86400), "/");
            if($username != "admin"){
                echo "<script>alert ('Login Successfully....'); window.location='./Dashboard.php';</script>";
            }
            else{
                echo "<script>alert ('Logged as an Admin....'); window.location='./admin.php';</script>";
            }
        }
        else{

            echo "<script>alert ('Invalid Email or Password..<br>Enter again...'); window.location='Login.php';</script>";
        }
    }
    else{

        echo "<script>alert ('Invalid Email or Password..<br>Enter again...'); window.location='Login.php';</script>";
    }
    }
?>