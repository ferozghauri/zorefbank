<?php 

 $connect = mysqli_connect("localhost", "root", "","zorefbank");
if(isset($_POST["id"]))
{
        $cno = $_POST["id"];
        $delete = "DELETE FROM customer WHERE Cust_no = '$cno'";  
        mysqli_query($connect,$delete);
   
}
?>