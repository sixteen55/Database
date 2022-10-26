<?php
require('session.php');
require('dbcon.php');
?>
<html>
<style>
.error{
    margin-left: 15px;
    width: 90%;
    text-align: center;
    color: black;
    margin-top: 50px;
    border-radius: 3px;
    transition: 300ms;
    background: #ff2121ec;
}
.succeed{
    margin-left: 15px;
    width: 90%;
    text-align: center;
    color: black;
    margin-top: 50px;
    border-radius: 3px;
    transition: 300ms;
    background: #2cff21;
}
</style>
<head>
    <title>Login And Register page</title>
    <link rel="stylesheet" href="login-register.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>

            <form id="login" class="input-group" action="login.php" method="post">
                <input type="text" class="input-field" name="phone_number" placeholder="Phone number" required>
                <input type="text" class="input-field" name="password" placeholder="Password" required>
                <input type="checkbox" class="chech-box2"><span>Remember Password</span>
                <button type="submit" class="submit-btn" style="color: white;">Log in</button>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif ?>
                <?php if (isset($_SESSION['succeed'])) : ?>
                    <div class="succeed">
                        <?php 
                        echo $_SESSION['succeed'];
                        unset($_SESSION['succeed']);
                        ?>
                    </div>   
                <?php endif ?>
            </form>

            <form id="register" class="input-group" action="register.php" method="post">
                <input type="text" class="input-field" name="phone_number" placeholder="Phone number" required>
                <input type="text" class="input-field" name="password" placeholder="Password" required>
                <input type="email" class="input-field" name="email" placeholder="Email" required>
                <input type="text" class="input-field" name="fname" placeholder="First name" required>
                <input type="text" class="input-field" name="lname" placeholder="Last name" required>
                <input type="radio" class="chech-box2" id="participant" name="roll" value="participant">
                <label for="participant"><span>Participant</span></label><br>
                <input type="radio" class="chech-box" id="organizer" name="roll" value="organizer">
                <label for="organizer"><span>Organizer</span></label><br>
                <input type="checkbox" class="chech-box"><span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn" style="color: white;">Register</button>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");
        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>

</body>
</html>