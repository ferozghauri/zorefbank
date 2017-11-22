<?php 
    $connect = mysqli_connect("localhost", "root", "", "zorefbank");
    $sql = "SELECT * FROM messages";
    $output='';
    $result = mysqli_query($connect, $sql);
   while($msg_info=mysqli_fetch_array($result)){
    
    $output .= '
     <div class="row" id="'.$msg_info['msg_id'].'">
    <div class="col-xs-8" style="background-color: #ececec; padding: 20px;">
    <div class="row">
    <div class="col-xs-8">
    <h4 style="font-size: 23px;"><a>'.$msg_info['first_name'].' '.$msg_info['last_name'].'</a></h4>
    </div>
    <div class="col-xs-4">
        <h6><a style="color: grey; font-weight: thin; font-size: 15px;;">'.$msg_info['date_recieved'].'</a></h6>
    </div>
    
    </div>
    <div class="row">
    <div class="col-xs-8">
    <label style="font-size: 20px;"><a>'.$msg_info['subject'].'</a></label>
    </div>
    </div>
    <div class="row">
    <div class="col-xs-12">
    <p style="color:black;">'.$msg_info['message'].'</p>
    </div>
    </div>
    </div>    
    </div>
    <br>
            
           ';  
          
   }
    
    
    echo $output;


?>