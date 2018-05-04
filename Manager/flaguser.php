<?php 

 $connect = mysqli_connect("localhost", "root", "","zorefbank");
if(isset($_POST["id"]))
{
        $cno = $_POST["id"];
        $delete = "UPDATE customer SET flag_status='red' WHERE Cust_no='$cno' ";  
        mysqli_query($connect,$delete);
    
        $delete = "UPDATE customer SET flag_status='red' WHERE Cust_no='$cno' ";  
        mysqli_query($connect,$delete);
   
   
}
?>
