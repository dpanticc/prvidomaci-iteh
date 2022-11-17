<?php
require 'db.php';
require 'class.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <?php include 'css/css.html'; ?>
    </head> 
<?php
    $object1 = new UserInterface();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['login'])){
            $object1 -> login();
        }

        elseif(isset($_POST['register'])){
            $object1 -> register();
        }

        elseif(isset($_POST['subscribe'])){
            $object1 -> subscribe();
        }

        elseif(isset($_POST['unsubscribe'])){
            $object1 -> unsubscribe();
        } 
    }
?>
<body>
    <div class="form">
        <!-- form klasa implementovana pomocu bootstrap, ubacujemo dva taba (signup i login) -->        
        <ul class="tab-group">
            <li class = "tab"><a href="#signup">Sign up</a></li> 
            <li class = "tab active"><a href="#login">Log in</a></li>
        </ul>

    <div class="tab-content">
            <!-- sredjivanje elementa u okviru taba login-->
        <div id="login">
            <h1>Welcome to WC22!</h1>
            <form action="index.php" method="post" autocomplete="off">

            <div class="field-wrap">
                <input type="text" id="email" class="form__input"autocomplete="off" placeholder=" ">
                <label for="email" class = "form__label">Email</label>
            </div>

            <div class="field-wrap">
            <input type="text" id="password" class="form__input"autocomplete="off" placeholder=" ">
                <label for="password" class = "form__label">Password</label>
            </div>
            
            <button type="button" class="btn btn-warning">Login</button>
            <!-- button type bootstrap -->

            </form>
        </div>
        
        <!-- sredjivanje elementa u okviru taba Signup-->
        <div id="signup">
            <h1>Sign up for free</h1>
            <form action="index.php" method="post" autocomplete="off">

            <div class="top-row">
                <div class="field-wrap">
                    <label>
                        First Name<span class="req">*</span>
                    </label>
                    <input type="text" required autocomplete="off" name="firstname"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Last Name<span class="req">*</span>
                    </label>
                    <input type="text" required autocomplete="off" name="lastname"/>
                </div>
            </div>
                <div class="field-wrap">
                    <label>
                        Email Adress<span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" name="email"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Set a Password<span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" name="password"/>
                </div>

                <button type="button" class="btn btn-warning">Register</button>
            </form>
            </div>
        </div> <!-- tab-content-->
    </div> <!-- form-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>