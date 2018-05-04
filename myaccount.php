<?php
session_start();
$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];
$user="root";
$password="";
$database ="zorefbank";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");
$querycustno = "select Cust_no from userrole where Password = '$p' and Username='$u'";
$resultcustno=mysql_query($querycustno);
$rowcustno=mysql_fetch_array($resultcustno);
$c= $rowcustno["Cust_no"];
$_SESSION['Cust_no']=$c;
$queryone = "SELECT acc_no from account where cust_no = '$c'";
$querytwo ="SELECT balance from account where cust_no = '$c'";
$querythree="SELECT account_type from account where cust_no = '$c'";
$custname ="SELECT * from customer where Cust_no='$c'";
$custnamer = mysql_query($custname);
$fetchcustname = mysql_fetch_array($custnamer);

$accountnumberquery=mysql_query($queryone);

$accountbalancequery=mysql_query($querytwo);

$accounttypequery=mysql_query($querythree);

$rownum=mysql_fetch_array($accountnumberquery);

$rowbal=mysql_fetch_array($accountbalancequery); 

$rowtype=mysql_fetch_array($accounttypequery);



$accountnumber = $rownum["acc_no"];
$accountbalance =$rowbal["balance"];
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
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="myaccount.php"><?php echo $fetchcustname["First_name"]; ?></a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="myaccount.php">My Account</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="ebilling.php">E-Billing</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="Transactions.php">Transactions</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="contact1.html">Contact</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="logout.php">LOG OUT</a></li>
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
                <h1 class="carousel-title">My Account</h1>
                <p>We are glad to see you as apart of our family. <br> Here you can have the true joy of hastleless banking.</p>
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
        <div class="row"><h1> <?php echo $fetchcustname["First_name"]; ?> <?php echo $fetchcustname["Last_name"]; ?></h1></div>
        <div class="row"><h4><?php echo $accounttype; ?></h4></div>
    </div>   
    </div>
    
    
    <div class="row">
     <div id="moneyinfo" class="col-lg-8">
         <br><br><br><br><br>
        <h4>Account Balance: <a><?php echo $accountbalance; ?></a> </h4>
        <br>
         <h4>Account Number: <a><?php echo $accountnumber; ?></a> </h4>
        <br>
        
        
    </div>
    
    </div>
    <div class="row">
     <div id="loan" class="col-lg-8">
         <br><br><br><br><br>
        <h3>APPLY FOR LOAN</h3>
        <br>
         <form action="applyloan.php" method="post">
         <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Amount</label>
                <div class="col-sm-12">
                <input type="text" class="form-control" id="email" name="amnt" placeholder="Enter Amount">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Duration</label>
                <div class="col-sm-12">
                <input type="text" class="form-control" id="pwd" name="dur" placeholder="Enter duration">
                </div>
            </div>
              <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Password</label>
                <div class="col-sm-12">
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                </div>
            </div>
            <br>
            <div class="row">
                <div class=" col-sm-3">
                <div class="checkbox">
                    <label><input type="checkbox">Agree</label>
                </div>
                </div>
                <div class=" col-sm-6">
                <div class="checkbox">
                    <a href="terms.html">Terms and conditions</a>
                </div>
                </div>
            </div>
            <br>
            <div class="row">
               <div class="col-sm-12">
                    <button type="submit" class="btn btn-default" id="submitcompany" name="l">Apply</button>
               </div>
            </div>
         </form>
        <br>
        
        
    </div>
    </div>
   
</div>
<div class="col-lg-4" >
    <br><br><br>
    <h3>NOTIFICATIONS</h3>
<div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="notifications.html"></iframe>
</div>
    
</div>
   
</div>
    <footer id="gtco-footer" role="contentinfo">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2017 Zoref Bank. All Rights Reserved.</small> 
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
            <!-- PAGE LEVEL SCRIPTS imp  -->
        <script src="js/layout.min.js" type="text/javascript"></script>
    <script src="vendor/jquery.parallax.min.js" type="text/javascript"></script>
    <!-- THEME STYLES imp -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>
</body>
</html>
