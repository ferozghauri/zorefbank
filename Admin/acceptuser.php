<?php 

 $connect = mysqli_connect("localhost", "root", "", "speedycashf");
if(isset($_POST["id"]))
{
    echo "hello i work";
    $cno = $_POST["id"];
    $sql = "SELECT * FROM newcustomer WHERE Cust_no = '$cno'";
    $result = mysqli_query($connect, $sql);
    $custinfo=mysqli_fetch_array($result);  
    $branchcode = 2101;               
    $buday = $custinfo['DoB'];             
    $fname = $custinfo['First_name'];
    $lname = $custinfo['Last_name'];
    $age = date_diff(date_create($buday), date_create('today'))->y;
    $dob = $custinfo['DoB'];
    $address = $custinfo['Address'];
    $phone = $custinfo['Contact'];
    $email = $custinfo['Email'];
    $query = "INSERT INTO Customer (Branch_code,First_name,Last_name,Email,Age,Dob,Contact,Address) VALUES ('$branchcode','$fname','$lname','$email','$age','$dob','$phone','$address')"; 
    $data = mysqli_query($connect, $query);
    if($data){
        $deletebill = "DELETE FROM newcustomer WHERE Cust_no = '$cno'";  
        mysqli_query($connect,$deletebill);
        mail($email,"Zoref Bank Account Confirmation",'Dear '.$u.'! Your account has been accepted! \n we warmly welcome you in the Zoref Bank family.' ,'From: zorefbank@gmail.com');
    }
    
}
?>