<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Maithri</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style1.css">
	<link rel="icon" type="image/png" href="images/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bd4d663ab2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/login.css">
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
          <li class="nav-item"><button class="nav-link btn-info" onclick="window.location.href='login.php'">Login</button></li>
        </ul>
    </nav>
    <!-- show message in case user enter invalid name format -->
    <div class="successMessage">
        <?php 
                    if(isset($_GET['signup'])) {
                        if($_GET['signup'] == "invalidname") {
                            echo "<span style='color: red; font-size:30px;'>!</span> The Full name you entered is not valid. Please enter a valid name.";
                        }
                    }
        ?>

            <!-- show message in case username already taken -->
        <?php 
                    if(isset($_GET['signup'])) {
                        if($_GET['signup'] == "usernametaken") {
                            echo "<span style='color: red; font-size:30px;'>!</span> The Username is already taken.";
                        }
                    }
        ?>
    </div>
    <div class="signup">
        <div class="signup-text">
            <span id="signuptext">Sign Up As Organizer</span>
        </div>
        <div class="signup-form">
            <br><br>
            <form onsubmit='return signupValidate();' action="db_connect/signup-check.php" method="POST">
                <input type="text" name="fullname" placeholder="Enter full Name" required><br><br>
                <input type="text" name="username" placeholder="username" pattern="[A-Za-z0-9]+" title="Username should only contain letters and numbers only. e.g. john12345" required><br><br>
                <input type="email" name="email" placeholder="E-mail" required><br><br>
                <input type="password" id = "password" name="password" placeholder="password" required><br><br>
                <input type="password" id="repeat-password" name="repeat-password" placeholder="Confirm password" required><br><br>
                <input type="tel" name="phone" placeholder="Phone: 98********" pattern="[0-9]{10}" required><br><br>
                <input type="checkbox" name="" required><span id="agreeterms"> Agree all terms and conditions</span><br>
                <input type="submit" class="btn btn-info" name="submit" value="Sign Up" id="submit">
            </form>
        </div>
    </div>  
<script src="script.js"></script>

  