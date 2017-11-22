<?php 
 $connect = mysqli_connect("localhost", "root", "", "zorefbank");
if(isset($_POST["id"]))
{
    $cno = $_POST["id"];
    $sql = "SELECT * FROM newcustomer WHERE Cust_no = '$cno'";
    $result = mysqli_query($connect, $sql);
    $custinfo=mysqli_fetch_array($result);
    
    $output = '
        <div class="row">
            <div id="moneyinfo" class="col-lg-8">
                <br><br>
                <h2>'.$custinfo["First_name"].' '.$custinfo["Last_name"].'</h2>
                
                <h4>Customer Number: <a style="color: dodgerblue;">'.$custinfo["Cust_no"].'</a> </h4>
                
                <h4>Username: <a  style="color: dodgerblue;">'.$custinfo["Username"].'</a> </h4>
                
                <h4>Email: <a style="color: dodgerblue;">'.$custinfo["Email"].'</a> </h4>
                
                <h4>Initial amount: <a style="color: dodgerblue;">'.$custinfo["Init_amount"].'</a> </h4>
                
                <h4>Date of Birth: <a  style="color: dodgerblue;">'.$custinfo["DoB"].'</a> </h4>
                
                <h4>Contact number: <a  style="color: dodgerblue;">'.$custinfo["Contact"].'</a> </h4>
                
                <h4>Address: <a  style="color: dodgerblue;">'.$custinfo["Address"].'</a> </h4>
                
                <h4>Account type: <a  style="color: dodgerblue;">'.$custinfo["acc_type"].'</a> </h4>
                
                
            </div>
        </div>  
           ';  
          

    
    
    echo $output;
}

?>