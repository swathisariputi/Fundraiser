
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
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
  </head>
  <body>
    <!-- Responsive Nav Bar -->
    <nav class="navbar navbar-light navbar-expand-lg bg-transparent">
      <a class="navbar-brand" href="#"><img src="images/logo.png" id="logo-maithri" alt=""/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active"><a class="nav-link" href="index.html"><b><i>Home</i></b><span class="sr-only">(current)</span></a></li>
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
    <div class="main-container">
        <br>
        <h1>Donate via Bank | Wire transfer</h1>
        <div class="bank-details">
            <h2>You can donate in this campaign via Bank Transfer. The Bank details are below:</h2><hr>
                <div class="banks">
                    <table>
                        <tr>
                            <th colspan="3">Canara Bank</th>
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>XXXXXXXX</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>1111111111111111111</td>
                        </tr>
                    </table>
                </div>
            <br><hr>

        <hr>
        <br>
        <br>
        <h1>Donate via Khalti | Online Payment Gateway</h1>
        <div class="khalti-details">
            <h2>You can donate in this campaign via online payment gateway like Khalti.</h2>
            <button id="payment-button">Donate with Khalti</button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_dd21924111ba4f66a1abbddcf6eded68",
            "productIdentity": "1234567890",
            "productName": "Fund Raiser",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            checkout.show({amount: 1000});
        }
    </script>
    <br>
    <hr>
    <br> <br>