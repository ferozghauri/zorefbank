<?php 

 $connect = mysqli_connect("localhost", "root", "", "zorefbank");
if(isset($_POST["id"]))
{
        $cno = $_POST["id"];
        $deletebill = "DELETE FROM newcustomer WHERE Cust_no = '$cno'";  
        mysqli_query($connect,$deletebill);
   
}
?>