<?php
$connect=mysqli_connect("localhost","root","","zorefbank");
if(isset($_POST['f1'])){
    
$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
    

$query = "INSERT INTO messages (first_name,last_name,email,subject,message) VALUES ('$first_name','$last_name','$email','$subject','$message')";
$result = mysqli_query($connect,$query);
    if($result){
        mail($email,'Thank You for your feedback','Dear '.$first_name.'! your response has been recorded, Thank you for your time. We will get back to you at our soonest!');
        
    }
    
}
?>