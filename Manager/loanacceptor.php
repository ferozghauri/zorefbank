<?php 

 $connect = mysqli_connect("localhost", "root", "","zorefbank");
if(isset($_POST["id"]))
{
        $lno = $_POST["id"];
        $sql = "SELECT * FROM loanapplications WHERE L_id = '$lno'";
        $result = mysqli_query($connect, $sql);
        $custinfo=mysqli_fetch_array($result);                
        $cno = $custinfo['Cust_no'];             
        $accountnum = $custinfo['Acc_no'];
        $amountloan = $custinfo['amount'];
        $duration = $custinfo['duration'];
        $insert= "INSERT into acceptedloan (Cust_no,Acc_no,amount,duration) VALUES ('$cno','$accountnum','$amountloan','$duration')";  
        $data=mysqli_query($connect,$insert);
        if($data){
            $del= "DELETE FROM loanapplications where L_id='$lno'";  
            $data=mysqli_query($connect,$del);
        }
    
   
}
?>
