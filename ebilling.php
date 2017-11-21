<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E Billing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
       <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
 
    <style>
        .btn{
            
            border-radius: 0px;
        }
        .form-control{
            border-radius:0px;
            border: 0px;
        }
        #submitcompany{
            
            padding: 8px 80px;
            background-color: cornflowerblue;
            color: white;
        }
        #viewbillhistory{
            
            padding: 8px 80px;
            background-color: cornflowerblue;
            color: white;
            
        }
        .logo-small {
      color: cornflowerblue;
      font-size: 50px;
        }
    
        #head{
            background-color: #282828;
            color:white;
        }



#zoref {
    height: 100%;
    display: table-row;
}

.row .no-float {
  display: table-cell;
  float: none;
}
    </style>
    <script>
$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"billpayer.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
   
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id");  
             
                $.ajax({  
                     url:"deletebill.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
             
      }); 
    
        $.ajax({  
                url:"showregisteredbillers.php",  
                method:"POST",  
                success:function(data){  
                     $('#companies').html(data);  
                }  
           });
    
 });
</script>
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
                               <li class="nav-item"><a class="nav-item-child nav-item-hover" href="myaccount.php">My Account</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="ebilling.php">E-Billing</a></li>
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
                <h1 class="carousel-title">e-billing</h1>
                <p>tareefein about transactions or some details etc etc <br/> enim minim estudiat veniam siad venumus dolore</p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

<div class="container">
 
   
<div class="col-lg-8">
            <div class="row">
                <br><br><br><br><br>
                        <div class="col-lg-12">
                        <h3>Registered Companies</h3>
                        </div>
                        <br><br><br><br><br>
                        <div id="companies"></div>
                        </div>
            
    
            <br><br><br>
    
        <div id="moneyinfo" class="col-lg-12">
        <div class="row">
               <div class="col-sm-8">
                    <button type="submit" class="btn btn-default" id="viewbillhistory">View Bill History</button>
               </div>
            </div>
        </div>
     <br><br><br>
    <div id="moneyinfo" class="col-lg-12">
        <div class="row">
             <div class="well">
					<div id="live_data"></div> 
            </div>
            </div>
        <div class="row">
              <div class="well">
				<div id="live_data"></div>
            </div>
            </div>
        </div>
   
</div>
    <form action="verifybiller.php" method="POST">
        <div class="col-lg-4" style="background-color: #ececec; height: 700px;">
             <br><br><br><br><br>
            <h3>Register New</h3>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label" placeholder="Select Company">Select Company</label>
                <div class="col-sm-8">
                <select class="form-control" id="drop" name="drop">
                    
            <?php
                
               $u=$_SESSION['inuser'];
               $p=$_SESSION['pass'];
                $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "speedycashf";
           // Create Connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                trigger_error("Connection failed: " . mysqli_connect_error());
              
            }
    
           $stmt = "SELECT d.company_name from available_billers d, billersonbranches e where d.Biller_no not in (SELECT Biller_no FROM registered_biller where Cust_no =(SELECT Cust_no FROM customer_login  WHERE Username = '$u' and Password='$p')) and e.Branch_code= ( SELECT Branch_code from customer where Cust_no = (SELECT Cust_no from customer_login where Username = '$u' and Password = '$p')) and d.Biller_no = e.Biller_no";
            $result = mysqli_query($conn,$stmt) or die(mysqli_error($conn));
            while(list($categor) = mysqli_fetch_row($result)){
                echo '<option value="'.$categor.'">'.$categor.'</option>';
            }

            ?>
           
                </select>
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Email</label>
                <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
            </div>
            <br>
            <div class="row">
                <label for="inputLocation" class="col-sm-5 control-label">Enter Password</label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                </div>
            </div>
            <br>
            <div class="row">
                <div class=" col-sm-8">
                <div class="checkbox">
                    <label><input type="checkbox">Agree</label>
                </div>
                </div>
            </div>
            <br>
            <div class="row">
               <div class="col-sm-8">
                    <button type="submit" class="btn btn-default" id="submitcompany">Register</button>
               </div>
            </div>
            
        </div>
    </form>
        <br><br><br><br><br>
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
    <link rel="stylesheet" href="css/icomoon.css">
        <!-- PAGE LEVEL SCRIPTS imp  -->
        <script src="js/layout.min.js" type="text/javascript"></script>
    <script src="vendor/jquery.parallax.min.js" type="text/javascript"></script>
    <!-- THEME STYLES imp -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>
</body>
</html>
