<?php 
 $connect = mysqli_connect("localhost", "root", "", "zorefbank");
if(isset($_POST["id"]))
{
    $cno = $_POST["id"];
    $sql = "SELECT * FROM customer WHERE Cust_no = '$cno'";
    $queryone = "SELECT acc_no from account where Cust_no = '$cno'";
    $querytwo ="SELECT balance from account where cust_no = '$cno'";
    $querythree="SELECT account_type from account where cust_no = '$cno'";
    $result = mysqli_query($connect, $sql);
    $result2=mysqli_query($connect, $queryone);
    $custinfo=mysqli_fetch_array($result);
    $accountbalancequery=mysqli_query($connect, $querytwo);
    $accounttypequery=mysqli_query($connect, $querythree);
    $accountinfo=mysqli_fetch_array($result2);
    $rowbal=mysqli_fetch_array($accountbalancequery);
    $rowtype=mysqli_fetch_array($accounttypequery);
    
    
    $output = '
        <div class="row">
            <div id="moneyinfo" class="col-lg-8">
                <br><br>
                <h2>'.$custinfo["First_name"].' '.$custinfo["Last_name"].'</h2>
                
                <h4>Customer Number: <a style="color: dodgerblue;">'.$custinfo["Cust_no"].'</a> </h4>
                
                <h4>Account Number: <a style="color: dodgerblue;">'.$accountinfo["acc_no"].'</a> </h4>
                
                <h4>Account Type: <a style="color: dodgerblue;">'.$rowtype["account_type"].'</a> </h4>
                
                <h4>Balance: <a style="color: dodgerblue;">'.$rowbal["balance"].'</a> </h4>
                
                <h4>Email: <a style="color: dodgerblue;">'.$custinfo["Email"].'</a> </h4>
                
                <h4>Age: <a style="color: dodgerblue;">'.$custinfo["Age"].'</a> </h4>
                
                <h4>Date of Birth: <a  style="color: dodgerblue;">'.$custinfo["DoB"].'</a> </h4>
                
                <h4>Contact number: <a  style="color: dodgerblue;">'.$custinfo["Contact"].'</a> </h4>
                
                <h4>Address: <a  style="color: dodgerblue;">'.$custinfo["Address"].'</a> </h4>
                
                
            </div>
        </div> 
           
            
           ';  
          

    
    
    echo $output;
}

?>