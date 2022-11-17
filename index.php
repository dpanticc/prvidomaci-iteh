<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <?php include 'css/css.html'; ?>
    </head> 

<body>
    <div class="form">
        <!-- form klasa implementovana pomocu bootstrap, ubacujemo dva taba (signup i login) -->        
        <ul class="tab-group">
            <li class = "tab"><a href="signup"></a></li> 
            <li class = "tab active"><a href="login"></a></li>
        </ul>

        <!-- sredjivanje elementa u okviru taba login-->
    <div class="tab-content">
        <div id="login">
            <h1>Welcome!</h1>
            <form action="index.php" method="post" autocomplete="off">

            <div class="field-wrap">
                <label>
                    Email Address<span class="req">*</span>
                </label>
            <input type="email" required autocomplete="off" name="email"/>
            </div>

            <div class="field-wrap">
                <label>
                    Password<span class="req">*</span>
                </label>
                <input type="password" required autocomplete="off" name="password"/>
            </div>
            
            <button type="button" class="btn btn-outline-primary">Log in</button>
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
                    <input type="text" required autocomplete="off" name="lasttname"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Email Adress<span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" name="email"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" name="password"/>
                </div>

                <button type="submit" class="button button-block" name="register" />Register</button>

            </form>
            </div>
        </div> <!-- tab-content-->
    </div> <!-- form-->

</body>