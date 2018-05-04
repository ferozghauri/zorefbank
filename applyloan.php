<?php
session_start();

$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];   


if(isset($_POST['l']))
{
$amountloan = $_POST['amnt'];
$pass =$_POST['pwd'];
$duration =$_POST['dur'];
$user="root";
$password="";
$database ="zorefbank";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");
    
$querytwo ="SELECT Cust_no FROM userrole WHERE username = '$u' and password='$p'";
$custnoquery=mysql_query($querytwo);

    
$rowcustno=mysql_fetch_array($custnoquery);
$cno = $rowcustno["Cust_no"];
$querythree="SELECT Acc_no FROM account WHERE Cust_no='$cno'";

$accountnum=mysql_query($querythree);
    

$ownrow=mysql_fetch_array($accountnum);
$accountnumber = $ownrow["Acc_no"];
    
$queryinsert ="INSERT into loanapplications (Cust_no,Acc_no,amount,duration) VALUES ('$cno','$accountnumber','$amountloan','$duration')";
if(mysql_query($queryinsert)){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Loan Applied')
        window.location.href='myaccount.php'
        </SCRIPT>");
}
}

?>