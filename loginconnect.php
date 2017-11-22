<?php
session_start();
$inuser = $_POST["us"];
$_SESSION['inuser'] = $inuser;
$pass = $_POST["pas"];
$_SESSION['pass'] = $pass;
$user="root";
$password="";
$database ="zorefbank";
$connect = mysql_connect("localhost:3306", $user, $password);
@mysql_select_db($database) or ("database not found");

$query = "SELECT * FROM userrole WHERE username = '$inuser'";
$querypass ="SELECT * FROM userrole WHERE password = '$pass' and username='$inuser'";
$queryrole ="SELECT * FROM userrole WHERE password = '$pass' and username='$inuser'";

$result=mysql_query($query);
$resultpass=mysql_query($querypass);
$resultrole = mysql_query($queryrole);

$row=mysql_fetch_array($result);
$rowpass=mysql_fetch_array($resultpass);
$rowrole = mysql_fetch_array($resultrole);


$serveruser = $row["username"];
$serverpass =$rowpass["password"];
$serverrole = $rowrole["role"];

//$_SESSION['cust_no']=$servercustno;
if($serveruser&&$serverpass){
if(!$result){
die("username or pass incorrect ");
}
echo "<br>center>Database output</b></center<br><br>";
mysql_close();
} 
if($pass == $serverpass && $pass && $inuser)
{	
    if($serverrole == "admin"){
       header("Location: Admin/adminhome.html"); 
    }
    else if($serverrole == "manager"){
       header("Location: Manager/managerhome.php"); 
    }
    else if($serverrole == "user"){
       header("Location: myaccount.php"); 
    }
	
}else
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Wrong username password combination.Please re-enter.')
        window.location.href='Login.php'
        </SCRIPT>");

}

?>