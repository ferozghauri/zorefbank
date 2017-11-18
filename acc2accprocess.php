<?php
session_start();

$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];   


if(isset($_POST['t']))
{
$accountnum =$_POST['accno'];
$amounttrans = $_POST['ramnt'];
$pass =$_POST['passwd'];  
$user="root";
$password="";
$database ="speedycashf";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");
    
$queryone = "SELECT Acc_no FROM account where Acc_no='$accountnum'"; 
$querytwo ="SELECT a.BalancewithInterest FROM account a, customer_login c WHERE c.Username = '$u' and c.Password='$p' and c.Cust_no=a.Cust_no";
$querythree="SELECT a.Acc_no FROM account a, customer_login c WHERE c.Username = '$u' and c.Password='$p' and c.Cust_no=a.Cust_no";
$accountnumberquery=mysql_query($queryone);
$accountbalancequery=mysql_query($querytwo);
$ownaccountnum=mysql_query($querythree);
    
$rownum=mysql_fetch_array($accountnumberquery);
$rowbal=mysql_fetch_array($accountbalancequery);
$ownrow=mysql_fetch_array($ownaccountnum);
    
$accountnumber = $rownum["Acc_no"];
$accountbalance =$rowbal["BalancewithInterest"];
$ownaccountnumber = $ownrow["Acc_no"];
    
    
    
if($accountnumber && $amounttrans<$accountbalance && $pass == $p && $amounttrans && $pass)
{ 
mysql_query("BEGIN");
$queryone="Update account set BalancewithInterest = (BalancewithInterest+'$amounttrans') where Acc_no='$accountnumber'";
$querythree="Update account set BalancewithInterest = (BalancewithInterest-'$amounttrans') where Acc_no='$ownaccountnumber'";
    
$queryo="Update account set Balance = (Balance+'$amounttrans') where Acc_no='$accountnumber'";
$queryt="Update account set Balance = (Balance-'$amounttrans') where Acc_no='$ownaccountnumber'";
$sDate = date("Y-m-d H:i:s");     
$querytwo= "INSERT INTO `acc2acc` (`T_id`, `Acc_no`, `Reciever_acc_no`, `Amount`, `DateTime`) VALUES ('', '$ownaccountnumber', '$accountnumber', '$amounttrans','$sDate')";
mysql_query($queryone);
mysql_query($querythree);
    
mysql_query($queryo);
mysql_query($queryt);
mysql_query($querytwo);
if(!$queryone)
{
    mysql_query("ROLLBACK");
}
    else
    {
    mysql_query("COMMIT");
        echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Transaction Successful!')
        window.location.href='Transactions.php'
        </SCRIPT>");
    }
    
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
else if (empty($accountnumber))
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
    echo '!!';
     }

}
?>