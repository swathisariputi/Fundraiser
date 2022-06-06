<?php
    $currentDate = date('Y-m-d');
    include_once 'db_connect/dbh.php';
    $sql = "SELECT campaign_id,DATE(DATE_ADD(campaign_reg_date, INTERVAL campaign_days DAY)) AS endDate,
        DATE(campaign_reg_date) AS startDate
        FROM campaigns;";

    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $campaignId = $row['campaign_id'];
            $campaignStartDate = $row['startDate'];
            $campaignEndDate = $row['endDate'];
            if($currentDate > $campaignEndDate) {
                $sql = "UPDATE campaigns
                        SET campaignExpiry = 0 
                        WHERE campaign_id = '$campaignId';";
                mysqli_query($conn, $sql);
            }
        }
    }

?>
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
  </head>
  <body>
    <!-- Responsive Nav Bar -->
    <nav class="navbar navbar-light navbar-expand-lg bg-transparent">
      <a class="navbar-brand" href="#"><img src="images/logo.png" id="logo-maithri" alt=""/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active"><a class="nav-link" href="index2.html"><b><i>Home</i></b><span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="#">Browse Fundraisers</a></li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fundraise for</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter"style="width:auto;" href="#">Medical Treatment</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter"style="width:auto;" href="#">NGO/Charity</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter"style="width:auto;" href="#">Other Cause</a>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="howitworks.html">How it works</a></li>
        <form class="form-inline ">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search" style="color:ghostwhite;"></i></button>
        </form>
        <li class="nav-item"><a class="btn btn-outline-success" type="button" href="https://api.whatsapp.com/send?phone=918919674844" target="_blank"><i class="fab fa-whatsapp" style="color: green;"></i> Chat</a></li>
        <button class="nav-item btn btn-sm btn-outline-secondary ml-sm-2" type="button" data-toggle="modal" data-target="#exampleModalCenter"style="width:auto;">Start a fundraiser</button>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-2x"></i> </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="MyAccount.php">My account</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="index.html">Logout</a>
          </div>
        </li>
      </ul>
      </div>
    </nav>
    <!--*** Responsive Nav Bar ***-->
    <main>
    <div id="browse-fundraiser">
<div class="flex-container">
  <div class="left">
  <h2>Categories</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<ul id="myUL">
  <li><a href="#">Education</a></li>
  <li><a href="#">Covid</a></li>
  <li><a href="#">Animals</a></li>
  <li><a href="#">Children</a></li>
  <li><a href="#">Girls and Women</a></li>
  <li><a href="#">Others</a></li>
</ul>  
  </div>
  <div class="right">
    <div class="main-container">
    <h2>Here below are some campaigns where you can Donate Funds as much as you like.</h2>
    <div class="all-campaigns">
        <?php
            $sql = "SELECT * FROM campaigns WHERE  campaignExpiry = 1 ORDER BY campaign_id DESC;";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);            
            if($resultCheck > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $campaignId = $row['campaign_id'];
                    // echo "$campaignId";               
        ?>
        <div class="preview-box">
            <form action="eachfundraiser.php?campaignId=<?php echo $campaignId;?>" method="POST">
                <span id='campaign-name'><?php echo $row['campaign_name']; ?></span><br><br>
                <span id='campaign-type'><?php echo $row['campaign_type']; ?></span><br><br>
                <button class="btn btn-info" type="submit" name="donate">View Campaign</button>
            </form>
        </div>   
        <?php
            }
        } else if($resultCheck == 0) {
            echo "<p>There are no active Campaign right now</p>";
        } else {
            exit();
        }
        ?>    
    </div>    
    <!--- Trending fundraisers section -->
    <section id="trending-fundraisers">
        <div class="sectiontitle">
            <h1><b>Trending Fundraisers</b></h1>
            <p>View the fundraisers that are most active right now </p>
        </div>
        <div class="container my-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <div id="carousel2" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carousel2" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel2" data-slide-to="1"></li>
                          <li data-target="#carousel2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <div class="card mr-3">
                                        <img src="images/trendingfundraiser1.jpg" class="card-img-top" alt="..." style="height: 400px;">
                                        <div class="card-body">
                                          <h2>Help this kid beat cancer!</h2>
                                          <p><i class="fas fa-user"></i> by devika</p>
                                          <div class="progress-text">
                                              <pre class="progress-top"><b>$2000</b> raised out of 
$24000</pre>
                                              <div class="progress">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:8.66%"></div>
                                              </div>
                                          </div>
                                          <div class="flex-container">
                                            <div class="button-shr"><p><i class="far fa-clock"></i>20 days left</p><h2 class="btn btn-light btn btn-outline-secondary"><a class="share" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" style="color: blue;"></i> Share</a></h2></div>
                                            <div class="button-dnt"><p><i class="fas fa-heart" style="color: red;"></i>1500 supporters</p><h2 class="btn btn-info"><a href="donate.php" class="donate">DONATE NOW</a></h2></div>
                                          </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="card mr-3">
                                        <img src="images/trendingfundraiser2.jpg" class="card-img-top" alt="..." style="height: 400px;">
                                        <div class="card-body">
                                          <h2>Help this kid in his education!</h2>
                                          <p><i class="fas fa-user"></i> by Aman</p>
                                          <div class="progress-text">
                                              <pre class="progress-top"><b>$10000</b> raised out of 
$50000</pre>
                                              <div class="progress">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%"></div>
                                              </div>
                                          </div>
                                          <div class="flex-container">
                                            <div class="button-shr"><p><i class="far fa-clock"></i>5 days left</p><h2 class="btn btn-light btn btn-outline-secondary"><a class="share" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" style="color: blue;"></i> Share</a></h2></div>
                                            <div class="button-dnt"><p><i class="fas fa-heart" style="color: red;"></i>10000 supporters</p><h2 class="btn btn-info"><a href="donate.php" class="donate">DONATE NOW</a></h2></div>
                                          </div>
                                        </div>
                                     </div>
                                </div>
                                
                                
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <div class="card mr-3">
                                        <img src="images/trendingfundraiser3.jpg"  class="card-img-top" alt="..." style="height: 400px;">
                                        <div class="card-body">
                                          <h2>Donate for Planting Trees </h2>
                                          <p><i class="fas fa-user"></i> by Raju</p>
                                          <div class="progress-text">
                                              <pre class="progress-top"><b>$5000</b> raised out of 
$10000</pre>
                                              <div class="progress">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%"></div>
                                              </div>
                                          </div>
                                          <div class="flex-container">
                                            <div class="button-shr"><p><i class="far fa-clock"></i>40 days left</p><h2 class="btn btn-light btn btn-outline-secondary"><a class="share" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" style="color: blue;"></i> Share</a></h2></div>
                                            <div class="button-dnt"><p><i class="fas fa-heart" style="color: red;"></i>2002 supporters</p><h2 class="btn btn-info"><a href="donate.php" class="donate">DONATE NOW</a></h2></div>
                                          </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="card mr-3">
                                        <img src="images/trendingfundraiser4.jpg" class="card-img-top" alt="..." style="height: 400px;">
                                        <div class="card-body">
                                          <h2>Donate for Animal Health!</h2>
                                          <p><i class="fas fa-user"></i> by Ramu</p>
                                          <div class="progress-text">
                                              <pre class="progress-top"><b>$500</b> raised out of 
$5000</pre>
                                              <div class="progress">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%"></div>
                                              </div>
                                          </div>
                                          <div class="flex-container">
                                            <div class="button-shr"><p><i class="far fa-clock"></i>6 days left</p><h2 class="btn btn-light btn btn-outline-secondary"><a class="share" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" style="color: blue;"></i> Share</a></h2></div>
                                            <div class="button-dnt"><p><i class="fas fa-heart" style="color: red;"></i>4500 supporters</p><h2 class="btn btn-info"><a  class="donate"href="donate.php">DONATE NOW</a></h2></div>
                                          </div>
                                        </div>
                                     </div>
                                </div>
                                
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="row">
                                <div class="col-6 mb-4">
                                    <div class="card mr-3">
                                        <img src="images/trendingfundraiser5.jpg" class="card-img-top" alt="..." style="height: 400px;">
                                        <div class="card-body">
                                          <h2>Help Rajesh to win over Brain Tumour!</h2>
                                          <p><i class="fas fa-user"></i> by Mahesh</p>
                                          <div class="progress-text">
                                              <pre class="progress-top"><b>$40000</b> raised out of 
$100000</pre>
                                              <div class="progress">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:40%"></div>
                                              </div>
                                          </div>
                                          <div class="flex-container">
                                            <div class="button-shr"><p><i class="far fa-clock"></i>55days left</p><h2 class="btn btn-light btn btn-outline-secondary"><a class="share" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" style="color: blue;"></i> Share</a></h2></div>
                                            <div class="button-dnt"><p><i class="fas fa-heart" style="color: red;"></i>8567 supporters</p><h2 class="btn btn-info"><a href="donate.php" class="donate">DONATE NOW</a></h2></div>
                                          </div>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-6  mb-4">
                                    <div class="card mr-3">
                                        <img src="images/trendingfundraiser6.jpg" class="card-img-top" alt="..." style="height: 400px;">
                                        <div class="card-body">
                                          <h2>Raise fund for corona</h2>
                                          <p><i class="fas fa-user"></i> by Suman</p>
                                          <div class="progress-text">
                                              <pre class="progress-top"><b>$12000</b> raised out of 
$20000</pre>
                                              <div class="progress">
                                                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%"></div>
                                              </div>
                                          </div>
                                          <div class="flex-container">
                                            <div class="button-shr"><p><i class="far fa-clock"></i>34 days left</p><h2 class="btn btn-light btn btn-outline-secondary"><a class="share" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook" style="color: blue;"></i> Share</a></h2></div>
                                            <div class="button-dnt"><p><i class="fas fa-heart" style="color: red;"></i>1087 supporters</p><h2 class="btn btn-info"><a class="donate" href="donate.php">DONATE NOW</a></h2></div>
                                          </div>
                                        </div>
                                     </div>
                                </div>
                                
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>
            </div>
        </div>
      </section>
      <!--- *** Trending fundraisers section *** -->    
</div>

  </div>
  </div>
</div>
