<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maithri</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style1.css">
	<link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bd4d663ab2.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Responsive Nav Bar -->
    <nav class="navbar navbar-light navbar-expand-lg bg-transparent">
        <a class="navbar-brand" href="#"><img src="images/logo.png" id="logo-maithri" alt=""/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="howitworks.html">How it works</a></li>
          <li class="nav-item"><button class="nav-link btn-info" id="signup" onclick="window.location.href='signup.php'">Signup</button></li>
        </ul>
    </nav>
    <!--Message on login error or success-->
    <div class="loginMessage">
        <!--after user do complete signup and verify email-->
        <?php 
                    if(isset($_GET['emailverified'])) {     
                        if($_GET['emailverified'] == "success"){
                            echo "You have successfully signed up and verified your email. Now you can login as user in Fund Raiser";
                        }
                    }
        ?>
        <!--after password has been reset-->
        <?php 
                    if(isset($_GET['newpassword'])) {
                        if($_GET['newpassword'] == "passwordupdated") {
                            echo 'Your password has been reset. Now you can login to the system using new password';
                        }
                    }
        ?>
        <!--in case of non authentic user-->
        <?php 
                    if(isset($_GET['login'])) {
                        if($_GET['login'] == "notauthenticuser") {
                            echo "You are not an authentic registered user.";
                        }
                    }
        ?>
        <!--if password is not correct-->
        <?php 
                    if(isset($_GET['login'])) {
                        if($_GET['login'] == "invalidPassword") {
                            echo "You entered wrong password, Please enter a valid password. Or Reset your password if you forgot it";
                        }
                    }
        ?>
        <!--if account is not verified-->
        <?php 
                    if(isset($_GET['account'])) {
                        if($_GET['account'] == "notverified") {
                            echo "This account has not been yet verified. An email was sent to your registered email ";
                        }
                    }
        ?>
        <!--if user tries to access login-check.php directly -->
        <?php 
                    if(isset($_GET['login'])) {
                        if($_GET['login'] == "error") {
                            echo "OOPs! you tried to access the wrong page";
                        }
                    }
        ?>
    </div>
    <!-- login box -->
    <div class="login">
        <div class="main-text">
        <h3>Maithri - Acts of grace</h3>
        <span id="logintext">Login</span></div>
        <div class="main-form">
            <br><br><br>
            <form action="db_connect/login-check.php" method="POST">
                User Name: <input type="text" name="username" placeholder="Username/E-mail" required><br><br>
                Password : <input type="password" name="password" placeholder="password" required><br><br>
                <a href="forgotpassword.php">forget password?</a><br>
                <input type="submit" class="btn btn-info" name="submit" value="Login">
            </form>
        </div>
    </div>
    </body>
    </html>
                        