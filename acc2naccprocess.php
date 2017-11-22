<?php
session_start();
$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];
$user="root";
$password="";
$database ="zorefbank";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");

if(isset($_POST['t1'])){
$accountnum =$_POST['accno'];
$amounttrans = $_POST['ramnt'];
$expiry= $_POST['datetimepicker1'];
$pass =$_POST['passwd'];  

$queryone="SELECT a.Email from customer a, userrole b where b.Username='$u' and b.Password='$p' and a.Cust_no=b.Cust_no";
$querytwo ="SELECT a.Balance FROM account a, userrole c WHERE c.Username = '$u' and c.Password='$p' and c.Cust_no=a.Cust_no";
$querythree="SELECT a.Acc_no FROM account a, userrole c WHERE c.Username = '$u' and c.Password='$p' and c.Cust_no=a.Cust_no";
    
$accountbalancequery=mysql_query($querytwo);
$ownaccountnum=mysql_query($querythree);
$emailn=mysql_query($queryone);
    
$rowbal=mysql_fetch_array($accountbalancequery);
$ownrow=mysql_fetch_array($ownaccountnum);
$emailrow=mysql_fetch_array($emailn);
    
$accountbalance = $rowbal["Balance"];
$ownaccountnumber = $ownrow["Acc_no"];
$email = $emailrow["Email"];
    
function Voucherno($length = 6, $chars = '1234567890')
{
    $result = mysql_query("SELECT voucher_no FROM voucher");
    $storeArray = array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] =  $row['voucher_no'];  
}
    $chars_length = (strlen($chars) - 1);
    $stringv = $chars{rand(0, $chars_length)};
    for ($i = 1; $i < $length; $i = strlen($stringv))
    {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $stringv{$i - 1}) $stringv .=  $r;
    }
   if (in_array($stringv, $storeArray)) {
       $a=Voucherno();
   }
       else{
     $storeArray[] = $stringv;
    return $stringv;
   }

}
function myOTP($length = 8, $chars = 'abcdefghijklmnopqrstuvwxyz1234567890')
{
    $chars_length = (strlen($chars) - 1);
    $stringo = $chars{rand(0, $chars_length)};
    for ($i = 1; $i < $length; $i = strlen($stringo))
    {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $stringo{$i - 1}) $stringo .=  $r;
    }
    return $stringo;
} 
function sendmail($email,$u,$stringo,$stringv)
{
         mail($email,"Speedycash Transaction Voucher",'Dear '.$u.'! Your One-Time password is: ' .$stringo. ' Your Voucher No is: ' .$stringv ,'From: teamspeedycash@gmail.com');
    }


    
    
if($accountnum && $amounttrans<$accountbalance && $pass == $p && $amounttrans && $pass )
{ 
$stringv=Voucherno();
$stringo=myOTP();
$sDate = date("Y-m-d H:i:s"); 
mysql_query("BEGIN");
$queryfour= "INSERT INTO `acc2nacc` (`T_id`, `Acc_no`, `Voucher_no`, `CNIC`, `Amount`,`DateTime`) VALUES ('', '$ownaccountnumber','$stringv', '$accountnum', '$amounttrans', '$sDate')";
if($expiry)
{
$exp=strtotime($expiry);
$expfor=date("Y-m-d H:i:s", $exp);
$querysix= "INSERT INTO `otp` (`Voucher_no`,`OTP`,`Expiry`) VALUES ('$stringv','$stringo','$expfor')";
}
if(empty($expiry))
{
$defaultexpiry = date("Y-m-d H:i:s", strtotime('+48 hours'));
$querysix= "INSERT INTO `otp` (`Voucher_no`,`OTP`,`Expiry`) VALUES ('$stringv','$stringo','$defaultexpiry')";
}
mysql_query($queryfour);
mysql_query($querysix);

if(!$queryfour or !$querysix)
{
    mysql_query("ROLLBACK");
}
    else
    {
    mysql_query("COMMIT");
     
    }
 
     echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Voucher Created Successfully Successful!')
        window.location.href='Transactions.php'
        </SCRIPT>");
   
   sendmail($email,$u,$stringo,$stringv);
}
     

    else if ($pass != $p){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password is incorrect. please enter again')
        window.location.href='Transactions.php'
        </SCRIPT>");

}
else if ($amounttrans>$accountbalance)
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('The amount specified exceeds your current account balance. please enter again')
        window.location.href='Transactions.php'
        </SCRIPT>"); 
}
else if (empty($accountnum))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Account Number field is empty or invalid. please enter again')
        window.location.href='Transactions.php'
        </SCRIPT>");
}
else if (empty($amountrans))
{
     echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Amount field can not be empty. please enter again')
        window.location.href='Transactions.php'
        </SCRIPT>");
}
else if (empty($pass))
{
     echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Password field can not be empty. please enter again')
        window.location.href='Transactions.php'
        </SCRIPT>");
}


else {
    echo '!!!';
}

}
mysql_close();

?>