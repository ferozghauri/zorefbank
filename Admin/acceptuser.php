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
    $username = $custinfo['Username'];
    $password = $custinfo['Password'];
    $acctype = $custinfo['acc_type'];
    $accountnumber = mt_rand(100000, 999999);
    $amount = $custinfo['Init_amount'];
    $role = 'user';
    $query = "INSERT INTO Customer (Branch_code,First_name,Last_name,Email,Age,Dob,Contact,Address) VALUES ('$branchcode','$fname','$lname','$email','$age','$dob','$phone','$address')"; 
    $data = mysqli_query($connect, $query);
    if($data){
        
        $query2 = "SELECT Cust_no FROM customer WHERE First_name = '$fname' and Last_name ='$lname'";
        $result2 = mysqli_query($connect,$query2);
        $custno = mysqli_fetch_array($result2);
        $thiscustno = $custno['Cust_no'];
        $query3 = "INSERT into account (Acc_no, Cust_no,Balance,Account_type) VALUES ('$accountnumber','$thiscustno','$amount','$acctype')";
        $runquery = mysqli_query($connect,$query3);
        $queryuserrole = "INSERT INTO userrole (Cust_no,username,password,role) VALUES ('$thiscustno','$username','$password','$role')";
        $datauserrole = mysqli_query($connect, $queryuserrole);
        mail($email,"Zoref Bank Account Confirmation",'Dear '.$u.'! Your account has been accepted! \n we warmly welcome you in the Zoref Bank family.' ,'From: zorefbank@gmail.com');
         $deletebill = "DELETE FROM newcustomer WHERE Cust_no = '$cno'";  
        mysqli_query($connect,$deletebill);
    }
    
}
?>