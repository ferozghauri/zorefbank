<?php
session_start();
$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];
$user="root";
$password="";
      $database ="speedycashf";
      $connect = mysql_connect("localhost:3306", $user, $password);
      @mysql_select_db($database) or ("database not found");
      $querycustno = "select Cust_no from customer_login where Password = '$p' and Username='$u'";
      $resultcustno=mysql_query($querycustno);
      $rowcustno=mysql_fetch_array($resultcustno);
      $c= $rowcustno["Cust_no"];
      $_SESSION['Cust_no']=$c;
      $queryone = "SELECT acc_no from account where cust_no = '$c'";
      $querytwo ="SELECT balancewithinterest from account where cust_no = '$c'";
      $querythree="SELECT account_type from account where cust_no = '$c'";

$accountnumberquery=mysql_query($queryone);

$accountbalancequery=mysql_query($querytwo);

$accounttypequery=mysql_query($querythree);

$rownum=mysql_fetch_array($accountnumberquery);

$rowbal=mysql_fetch_array($accountbalancequery); 

$rowtype=mysql_fetch_array($accounttypequery);



$accountnumber = $rownum["acc_no"];
$accountbalance =$rowbal["balancewithinterest"];
$accounttype= $rowtype["account_type"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
       <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
 
    
    <link rel="stylesheet" href="css/animate.css">
    <style>
    .col-lg-8 {
   -moz-hyphens:auto;
   -ms-hyphens:auto;
   -webkit-hyphens:auto;
   hyphens:auto;
   word-wrap:break-word;
}
      
     
    </style>
</head>
<body>
        <!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="index.html">
                             <img class="logo-img logo-img-main" src="zoref-logo-sm-white.png" alt="Asentus Logo">
                                <img class="logo-img logo-img-active" src="zoref-bank-logo-sm-blue.png" alt="Asentus Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="navbar-nav navbar-nav-right">
                               <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="myaccount.html">My Account</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="ebilling.php">E-Billing</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="Transactions.php">Transactions</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="budgeting.php">Budgeting</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="contact1.html">Contact</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="Login.html">LOG OUT</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->

        <!--========== PARALLAX ==========-->
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
            <div class="parallax-content container">
                <h1 class="carousel-title">Mera Khata</h1>
                <p>tareefein about transactions or some details etc etc <br/> enim minim estudiat veniam siad venumus dolore</p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

<div class="container">
<div class="col-lg-8">

    <div class="row">
        <div class="col-lg-3">
            <img id="img-circle" src="avatar.jpg" width="180px" height="180px">
        </div>
    
    <div class="col-lg-5" style="padding:20px;">
    <br/>
        <div class="row"><h1> <?php echo $_SESSION['inuser']; ?> </h1></div>
        <div class="row"><h4><?php echo $accounttype; ?></h4></div>
    </div>   
    </div>
    
    
    <div class="row">
     <div id="moneyinfo" class="col-lg-8">
         <br><br><br><br><br>
        <h4>Account Balance: <a><?php echo $accountbalance; ?></a> </h4>
        <br>
        <h4>Monthly Budget: <a><?php echo $_SESSION['budget']; ?> </a> </h4>
        <br>
        <h4>Cash used this month: <a><?php echo $_SESSION['cashused']; ?> </a> </h4>
        <br>
        <h4>Budget Meter</h4>
        <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:30%">
      <span class="sr-only">70% Complete</span>
    </div>
  </div>
        
    </div>
    
    </div>
   
</div>
<div class="col-lg-4" >
    <br><br><br>
    <h3>INBOX</h3>
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="notifications.html"></iframe>
</div>
    
</div>
   
</div>
            <!-- PAGE LEVEL SCRIPTS imp  -->
        <script src="js/layout.min.js" type="text/javascript"></script>
    <script src="vendor/jquery.parallax.min.js" type="text/javascript"></script>
    <!-- THEME STYLES imp -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>
</body>
</html>
