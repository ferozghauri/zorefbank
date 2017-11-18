<?php 

 $connect = mysqli_connect("localhost", "root", "", "speedycashf");
if(isset($_POST["id"]))
{
        $cno = $_POST["id"];
        $delete = "DELETE FROM Customer WHERE Cust_no = '$cno'";  
        mysqli_query($connect,$delete);
   
}
?>