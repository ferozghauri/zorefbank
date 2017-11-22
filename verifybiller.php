<?php
session_start();

$c_name=$_POST["drop"];
$_SESSION["c_name"]=$c_name;

$email=$_POST["email"];
$pass=$_POST["pwd"];


$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];

$user="root";
$password="";
$database ="zorefbank";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");


$confirm_code=md5(uniqid(rand())); 

$sql="INSERT INTO `register_verification` (`Email`,`Code`) VALUES ('$email','$confirm_code')";
$link= "http://localhost:8080//zorefbank/confirmbiller.php?passkey=$confirm_code&user=$u&com=$c_name&p=$p";
$result=mysql_query($sql);
if($result && $email && $pass == $p)
{
     mail($email,"Registration Verification",' Click on this link to complete the registration process: '.$link ,'From: teamspeedycash@gmail.com');
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Mail Sent!')
   window.location.href='ebilling.php'
   </SCRIPT>");
}
else if(empty($email)){
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email field can not be empty!')
   window.location.href='ebilling.php'
   </SCRIPT>");
}
else if(empty($pass))
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password field can not be empty!')
   window.location.href='ebilling.php'
   </SCRIPT>"); 
}
else if($pass != $p)
{
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Incorrect Password! please enter again.')
   window.location.href='ebilling.php'
   </SCRIPT>"); 
}
else{
    
}
?>