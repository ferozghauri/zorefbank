<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
    body{
        background-image: url("bg2.jpg");
    }
    #logo{
        width: 400px;
        height: 400px;
        top:50%;
    }
     #loginbox{
        width: 400px;
        height: 350px;
        background-color: rgba(0,0,0,0.7);
        top:50%;
    }
    #username,#password{
        padding: 10px;
        border: 0px;
    }
    #loginbutton{
        padding: 10px;
        border: 0px;
        border-radius: 0px;
        background-color: dodgerblue;
        color:white;
    }
    p{
        color:white;
    }
</style>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="col-xs-4 col-xs-offset-2 text-center">
  <div class="row text-center">
    <div class="center-block">
      <div id="logo" class="center-block">
          <a href="index.html"> <img src="zoref%20bank%20logo%20white.png" width="450px" height="300px"></a>    
        </div>
    </div> 
  </div>  
</div>
<div class="col-xs-4 text-center">
  <div class="row text-center">
    <div class="center-block">
      <div id="loginbox" class="center-block">
                            <div id="loginform">
                            <form action="loginconnect.php" method="post">
                                <br><br><br><br>
                                  <input name="us" class="col-xs-8 col-xs-offset-2" type="text" placeholder="username" id="username"/><br><br><br>
                                  <input name="pas" class="col-xs-8 col-xs-offset-2" type="password" placeholder="password" id="password"/><br><br><br>
                                  <button name="submit" id="loginbutton" class="btn btn-default col-xs-8 col-xs-offset-2">Login</button><br><br><br>
                                  <p class="message">Not registered?<a href="createaccount.html">Create an account</a></p>


                            </form>
                        </div>
        </div>
    </div> 
  </div>  
</div>
</body>
</html>
