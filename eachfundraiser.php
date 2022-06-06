<?php
    if(!isset($_POST['donate'])) { 
        header("Location: campaigns.php");
    }
?>
<?php
    if(isset($_GET['campaignId'])) {
        $campaignId = $_GET['campaignId'];

        include 'db_connect/dbh.php';
        $sql = "SELECT *,DATE(DATE_ADD(campaign_reg_date, INTERVAL campaign_days DAY)) AS endDate,
        DATE(campaign_reg_date) AS startDate
        FROM campaigns WHERE campaign_id = $campaignId;";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            $row = mysqli_fetch_assoc($result); 
            $campaignName = $row['campaign_name'];
            $campaignType = $row['campaign_type'];
            $campaignStartDate = $row['startDate'];
            $campaignEndDate = $row['endDate'];
            $campaignAmount = $row['campaign_amount'];
            $campaignDescription = $row['campaign_description'];
            $campaignPhone = $row['campaignPhone'];
            $campaignImage = $row['campaignImage']; 

            $campaignCreator = $row['campaignCreator']; //this is organizer's username

            $sql = "SELECT organizer_fullname,organizer_phone FROM organizers WHERE organizer_username = '$campaignCreator';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                $data = mysqli_fetch_assoc($result); 
                $organizerPhone = $data['organizer_phone'];
                $campaignCreatorFullname =  $data['organizer_fullname'];    
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
        <li class="nav-item"><a class="nav-link" href="browseFundraiser.php">Browse Fundraisers</a></li>
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
    <div class="x">
        <h1><?php echo $campaignName;?></h1><br><br>
        <div class="c-image">
            <img src="<?php echo $campaignImage; ?>" alt="" width="800"><br>
            <div class="image-caption">
                <span><?php echo $campaignType;?>:(<?php echo $campaignName;?>)</span>
            </div>
        </div><br><br>
        <table cell>
            <tr>
                <td style="width: 50%;"><strong>Type Of Fundraiser</strong></td>
                <td>:</td>
                <td><?php echo $campaignType;?></td>
            </tr>
            <tr>
                <td><strong>Fundraiser Stated On</strong></td>
                <td>:</td>
                <td><?php echo $campaignStartDate;?></td>
            </tr>
            <tr>
                <td><strong>Fundraiser will end On</strong></td>
                <td>:</td>
                <td><?php echo $campaignEndDate;?></td>
            </tr>
            <tr>
                <td><strong>Fundraiser Amount</strong></td>
                <td>:</td>
                <td>Rs. <?php echo $campaignAmount;?></td>
            </tr>
            <tr>
                <td><strong>Fundraiser organizer</strong></td>
                <td>:</td>
                <td><?php echo $campaignCreatorFullname;?></td>
            </tr>
            <tr>
                <td><strong>Phone(Campaign Specific)</strong></td>
                <td>:</td>
                <td><?php echo $campaignPhone;?></td>
            </tr>
            <tr>
                <td><strong>Phone(Organizers)</strong></td>
                <td>:</td>
                <td><?php echo $organizerPhone;?></td>
            </tr>
        </table>
        <h2>About the Campaign</h2>
        <p><?php echo $campaignDescription;?></p>

        <div class="donate-text">Donate For this Camaign</div> <br>
        <button class="btn btn-info" onclick="window.location.href='donate.php?campaignId=<?php echo $campaignId;?>'">Donate</button>
    </div>

    