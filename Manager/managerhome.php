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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.js"></script>
    
     

        
    <style>
        .logo-img{
            width: 40px;
        }
        #navbar{
            background-color: #282828;
        }
     
    </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" id="navbar">
    <div class="navbar-header">
      <a class="navbar-brand" style="font-weight: thick;" href="managerhome.php">Manager Pannel</a>
    </div>
      <div class="navbar-header">
      
          <a class="navbar-brand"> <img class="logo-img" src="../zoref-bank-logo-sm-blue.png"></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="showmessages.html">Feedback</a></li>
        <li><a href="loans.html">Loans</a></li>
      <li><a href="../index.html">Log out</a></li>
    </ul>
  </div>
</nav>
    <div class="container">
        <div class="col-xs-12 text-center">
        <h2>MANAGER PANNEL</h2>
            <h3>Home</h3>
        </div>
   <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Flag Status</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
 
        </table>
 
        <hr style="border:1px solid dodgerblue;">
        
    <div class="col-xs-12" id="user_profile">
    </div>
    
    </div>

        <!-- PAGE LEVEL SCRIPTS imp  -->
        <script src="../js/layout.min.js" type="text/javascript"></script>
        <script src="../vendor/jquery.parallax.min.js" type="text/javascript"></script>
        <!-- THEME STYLES imp -->
        <link href="../css/layout.min.css" rel="stylesheet" type="text/css"/>
     
        
    
</body>
</html>
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#example').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    }
   });
  }
    $(document).on('click', 'button[name=delete]', function(){
   var id=$(this).attr("id");  

        $.ajax({  
             url:"showprofile.php",  
             method:"POST",  
             data:{id:id},  
             dataType:"text",  
             success:function(data){  
                  $("#user_profile").html(data);
             }  
        });  
    });  
        $(document).on('click', 'button[name=red]', function(){
   var id = $(this).attr("id");
 
    $.ajax({
     url:"flaguser.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#example').DataTable().destroy();
      fetch_data();
     }
    });
   
  });
    $(document).on('click', 'button[name=green]', function(){
   var id = $(this).attr("id");
 
    $.ajax({
     url:"unflaguser.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#example').DataTable().destroy();
      fetch_data();
     }
    });
   
  });
 });
</script>