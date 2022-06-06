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

    <!-- body part -->
    <div class="message">
         <!-- if both the passwords do not match-->
        <?php 
                    if(isset($_GET['password'])) {
                        if($_GET['password'] == "notsame") {
                            echo "The passwords you entered must be same";
                        }
                    }
        ?>
        <!-- if user already reset password or the click the expired link from email -->
        <?php 
                    if(isset($_GET['reset'])) {
                        if($_GET['reset'] == "alreadyReset") {
                            echo "you need to resubmit your reset request! or you have already change your password with this link";
                        }
                    }
        ?>
    </div>
    <div class="resetPasswordBoxContainer">
            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if(empty($selector) || empty($validator)) {
                    echo 'Could not validate your request!';
                } else {
                    if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) { //to check the tokens are in hexadecimal in email message url that user get
            ?>
                        <form action="db_connect/resetpassword.php" method="POST">
                            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                            <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                            <input type="password" name="password" placeholder="Enter a new password" required>
                            <input type="password" name="repeatPassword" placeholder="Repeat new password" required><br>
                            <button type="submit" name="resetPasswordSubmit">Reset Password</button>
                        </form>
            <?php

                    }
                }
            ?>
    </div>
