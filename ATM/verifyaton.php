<?php
$cnic=$_POST["cnic"];
$vno=$_POST["vno"];
$pin=$_POST["pin"];
$user="root";
$password="";
$database ="zorefbank";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");


$queryone = "SELECT Voucher_no FROM acc2nacc WHERE Voucher_no = '$vno' ";
$querytwo = "SELECT OTP FROM otp WHERE Voucher_no = '$vno' ";
$querythree = "SELECT CNIC FROM acc2nacc WHERE Voucher_no = '$vno' ";
$queryfour = "SELECT Acc_no FROM acc2nacc WHERE Voucher_no='$vno' and CNIC='$cnic'";
$queryfive = "SELECT Amount FROM acc2nacc WHERE Voucher_no='$vno' and CNIC='$cnic'";
$querysix = "SELECT Expiry FROM otp WHERE Voucher_no='$vno'";
$queryseven = "SELECT Status from acc2nacc WHERE Voucher_no='$vno' and CNIC='$cnic'";

$vouchernoquery=mysql_query($queryone);

$otpquery=mysql_query($querytwo);

$cnicquery=mysql_query($querythree);

$senderquery=mysql_query($queryfour);

$amountquery=mysql_query($queryfive);

$expiryquery=mysql_query($querysix);

$statusquery=mysql_query($queryseven);

$rowvno=mysql_fetch_array($vouchernoquery);

$rowotp=mysql_fetch_array($otpquery);

$rowcnic=mysql_fetch_array($cnicquery);

$rowsender=mysql_fetch_array($senderquery);

$rowamount=mysql_fetch_array($amountquery);

$rowexpiry=mysql_fetch_array($expiryquery);

$rowstatus=mysql_fetch_array($statusquery);

$checkvno =$rowvno["Voucher_no"];
$checkotp = $rowotp["OTP"];
$checkcnic = $rowcnic["CNIC"];
$checksender = $rowsender["Acc_no"];
$checkamount = $rowamount["Amount"];
$checkexpiry = $rowexpiry["Expiry"];
$checkstatus = $rowstatus['Status'];

mysql_query($queryone);
mysql_query($querythree);
mysql_query($querytwo);
mysql_query($queryfour);
mysql_query($queryfive);

$time = date("Y-m-d H:i:s");

if($cnic && $vno && $pin && $cnic == $checkcnic && $vno == $checkvno && $pin == $checkotp && $time < $checkexpiry && $checkstatus == 'Not Cashed' )
{ 

$queryt="Update account set Balance = (Balance-'$checkamount') where Acc_no='$checksender'";
mysql_query($queryt);
$queryfour="Update acc2nacc set Status = 'Cashed' where Voucher_no='$vno'";
mysql_query($queryfour);
$sDate = date("Y-m-d H:i:s"); 
$queryfive="Insert Into `cashedout_vouchers` (`Voucher_no`,`Cashed_Time`) Values ('$vno', '$sDate')";
mysql_query($queryfive);

  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' cashed out!')
        window.location.href='atm.php'
        </SCRIPT>");
}
else if ($vno != $checkvno){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Voucher no is incorrect. please enter again')
        window.location.href='atm.php'
        </SCRIPT>");
}
else if ($pin != $checkotp)
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('The Pin is incorrect. please enter again')
        window.location.href='atm.php'
        </SCRIPT>"); 
}
else if($cnic != $checkcnic)
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('The CNIC is incorrect. please enter again')
        window.location.href='atm.php'
        </SCRIPT>");
}
else if (empty($cnic))
{
   echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('cnic field is empty or invalid. please enter again')
        window.location.href='atm.php'
        </SCRIPT>");
}
else if (empty($vno))
{
     echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('voucher no field can not be empty. please enter again')
        window.location.href='atm.php'
        </SCRIPT>");
}
else if (empty($pin))
{
     echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Pin field can not be empty. please enter again')
        window.location.href='atm.php'
        </SCRIPT>");
}
else if ($time > $checkexpiry)
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Pin is expired!')
        window.location.href='atm.php'
        </SCRIPT>"); 
}
else if ($checkstatus == 'Cashed')
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('This voucher has been used already!')
        window.location.href='atm.php'
        </SCRIPT>"); 
}

else {
    echo 'fck';
}
mysql_close();

?>