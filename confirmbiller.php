<?php
session_start();

$u=$_GET['user'];
$p=$_GET['p'];
$user="root";
$password="";
$database ="zorefbank";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");

$comname=$_GET["com"];
$passkey=$_GET['passkey'];

$sql1="SELECT * FROM register_verification WHERE code ='$passkey'";
$result1=mysql_query($sql1);
 

if($result1){

$count=mysql_num_rows($result1);

if($count==1)
{
$queryone = "SELECT * from available_billers where company_name = '$comname'";
$queryo=mysql_query($queryone);
$rows=mysql_fetch_array($queryo);
$id=$rows['Biller_no'];
$com_accno=$rows['Biller_account_no'];

$querytwo="SELECT Cust_no from userrole where Username ='$u' and Password='$p'";
$queryt=mysql_query($querytwo);
$rows=mysql_fetch_array($queryt);
$cus_accno=$rows['Cust_no'];

$sql2="INSERT INTO `registered_biller`(`Biller_no`,`Cust_no`) VALUES('$id','$cus_accno')";
$result2=mysql_query($sql2);

}


else {
echo "Wrong Confirmation code";
}


if($result2){

 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Registered!')
        window.location.href='ebilling.php'
        </SCRIPT>");
    
 
$sql3="DELETE FROM temp_verification WHERE code = '$passkey'";
$result3=mysql_query($sql3);
header("location: ebilling.php");
}
    
else {
        echo "Registration Failed. Contact Help.";
     }

}
mysql_close();
?>