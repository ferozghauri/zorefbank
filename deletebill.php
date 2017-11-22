<?php  
session_start();
$servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "zorefbank";
           // Create Connection
            $connect = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$connect) {
                trigger_error("Connection failed: " . mysqli_connect_error());
              
            }
$bno = $_POST["id"];
 
 
$u=$_SESSION['inuser']; 
$p=$_SESSION['pass'];

 if(mysqli_query($connect,"select * from bills where Bill_no = '$bno'"))  
 {  
 $queryone = "SELECT Biller_account_no from biller_accounts where Biller_no=(select Biller_no from bills where Bill_no = '$bno')"; 
 $querytwo ="SELECT Amount FROM bills where Bill_no='$bno'";
 $querythree="SELECT a.Acc_no FROM account a, userrole c WHERE c.Username = '$u' and c.Password='$p' and c.Cust_no=a.Cust_no";
 $qu ="SELECT a.Balance FROM account a, userrole c WHERE c.username = '$u' and c.password='$p' and c.Cust_no=a.Cust_no";

$com_accquery=mysqli_query($connect,$queryone);
$billquery=mysqli_query($connect,$querytwo);
$quone=mysqli_query($connect,$qu);

$ownaccountnum=mysqli_query($connect,$querythree);
$rownum=mysqli_fetch_array($com_accquery);

$rowbil=mysqli_fetch_array($billquery);
$rowqu =mysqli_fetch_array($quone);
$ownrow=mysqli_fetch_array($ownaccountnum);


$com_acc = $rownum["Biller_account_no"];
$bill_amount =$rowbil["Amount"];
$mon = $rowqu["Balance"];
$ownaccountnumber = $ownrow["Acc_no"];

if($com_acc && $bill_amount<$mon && $bill_amount )
{
mysqli_query($connect,"BEGIN");
$querythree="Update account set Balance = (Balance-'$bill_amount') where Acc_no='$ownaccountnumber'";
$queryone="Update biller_accounts set Balance = (Balance+'$bill_amount') where biller_account_no='$com_acc'";
$sDate = date("Y-m-d H:i:s"); 
$querytwo= "INSERT INTO `paid_bills` (`Bill_no`, `Amount`, `PaidTime`) VALUES ('$bno', '$bill_amount', '$sDate')";
mysqli_query($connect,$querythree);
mysqli_query($connect,$queryone);
mysqli_query($connect,$querytwo);
if(!$querythree or !$queryone or !$querytwo)
{
    mysqli_query($connect,"ROLLBACK");
}
    else
    {
    mysqli_query($connect,"COMMIT");
        echo ("Bill Payed!");
    }

     $deletebill = "DELETE FROM bills WHERE Bill_no = '".$_POST["id"]."'";  
     mysqli_query($connect,$deletebill);
     
}
 
 else if ($bill_amount>$mon)
{
    echo ("Bill amount exceeded the account Balance!");
}  

}

else
{
    echo ("something");
}

 mysqli_close($connect);  
 ?>