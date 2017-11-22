<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "zorefbank");
$c=$_SESSION['Cust_no'];
$custname ="SELECT * from customer where Cust_no='$c'";
$custnamer = mysqli_query($connect,$custname);
$fetchcustname = mysqli_fetch_array($custnamer);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transactions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    
     
<script>
$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"TransactionHistory/select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();   
  
 }); 
$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"TransactionHistory/select1.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data1').html(data);  
                }  
           });  
      }  
      fetch_data();   
  
 });
</script>
        
    <style>
        .form-control{
            
            border:0px;
            border-radius: 0px;
            background-color: #ececec
        }
        .btn-default{
            border:0px;
            border-radius: 0px;
            padding: 5px 60px;
            background-color: cornflowerblue;
            color: white;
        }
        #head{
            background-color: #282828;
            color:white;
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
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="myaccount.php">My Account</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="ebilling.php">E-Billing</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="Transactions.php">Transactions</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="contact1.html">Contact</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="Login.php">LOG OUT</a></li>
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
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/tt.jpg">
            <div class="parallax-content container">
                <h1 class="carousel-title">Transactions</h1>
            </div>
        </div>
        <!--========== PARALLAX ==========-->
<div class="container">

    <br><br><br>
<div class="row">
    
    
<div class="col-lg-6">
     <h3>Account to Account</h3>
        <br>
    <form action="acc2accprocess.php" method="post" name="Login_Form" >
             <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Account Number</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Enter Account Number" name="accno" id="accno" />
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Amount</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="ramnt" id ="ramnt" placeholder="Enter Amount" />
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Password</label>
                <div class="col-sm-8">
                <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Enter Password" />
                </div>
            </div>
            <br>
            <div class="row">
                <div class=" col-sm-8">
                <div class="checkbox">
                    <label><input type="checkbox">Agree to terms &amp; Conditions</label>
                </div>
                </div>
            </div>
            <br>
            <div class="row">
               <div class="col-sm-8">
                    <button type="submit" class="btn btn-default" name="t" id="t" >Transfer</button>
               </div>
            </div>
    </form>
</div>
<div class="col-lg-6">
<h3>Account to Non-Account</h3>
    <br>
            <form action="acc2naccprocess.php" method="post" name="Login_Form" >
             <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Recipent's CNIC</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="accno" name="accno" placeholder="CNIC">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Amount</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="ramnt" name="ramnt" placeholder="Amount">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Password</label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Enter password">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Exipiry Datw</label>
                <div class="col-sm-8">
                <div class='input-group date' name="datetimepicker1" id="datetimepicker1">
                    <input type='text' class="form-control" name="datetimepicker1" id="datetimepicker1" placeholder="Default Time 48 hours" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                    <script type="text/javascript">  
                 $('#datetimepicker1').datetimepicker();
                    </script>
                </div>
            </div>
            <br>
            <div class="row">
                <div class=" col-sm-8">
                <div class="checkbox">
                    <label><input type="checkbox">Agree to terms &amp; Conditions </label>
                </div>
                </div>
            </div>
            <br>
            <div class="row">
               <div class="col-sm-8">
                    <button type="submit" class="btn btn-default" name="t1" id="t1">Transfer</button>
               </div>
            </div>
    </form>
    
</div>    
</div>
    
    <hr style="border:1px; color"red;>
    <div class="col-lg-12">
    <br><br>
   
        <div class="row text-center">
        <h2>Transactions History</h2>
        </div>
        <div class="row">
        <h4>Account to Account Transactions</h4>
        </div>
         <div class="well">
				
					<div id="live_data"></div>
            </div>
        <div class="row">
        <h4>Account to Non-Account Transactions</h4>
        </div>
        <div class="well">
				
					<div id="live_data1"></div>
            </div>     
    </div>
        <div class="col-lg-12">
    <br><br>
        <br>
 
        
        
        
    </div>
   
</div>
    
            <!-- Back To Top -->

        <!-- CORE PLUGINS -->

    

        <!-- PAGE LEVEL PLUGINS -->
     
  
        
      
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
