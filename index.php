<?php
require "dbBroker.php";
require "model/user.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    $rs = User::logIn($name, $password, $conn);

    if ($rs->num_rows == 1) {
        echo "Uspesno ste se prijavili";
        $_SESSION['loggeduser'] = "prijavljen";
        $_SESSION['id'] = $rs->fetch_assoc()['id'];
        header('Location: home.php');
        exit();
    } else {
        //promeni 
        header("location:index.php?error=1");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet--->
    <link rel="icon" href="image/logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>Fudbalski timovi</title>
</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <h1>Welcome to WC22!</h1>
                <div class="container">
                    <input type="text" placeholder="Username" name="username" class="form-control" required>
                    <br>
                    <input type="password" placeholder="Password" name="password" class="form-control" required>
                    <br>
                    <button class="btn" type="sumbit">Log in</button>
                    
                </div>
                <?php
                        if(isset($_GET['error']) == true){
                            echo'<font color = white><p align = "center">Login denied! Wrong username or password, try again!</p></font>';
                        }
                    ?>
            </form>
            
        </div>
        
</body>

</html>