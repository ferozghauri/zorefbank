
<?php 
 $connect = mysqli_connect("localhost", "root", "", "speedycashf"); 
 
function newuser(){
     $connect = mysqli_connect("localhost", "root", "", "speedycashf");
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $init_amount = $_POST['amount'];
    $acc_type = $_POST['acc_type'];
    $query = "INSERT INTO newcustomer (First_name,Last_name,Email,password,username,city,DoB,Contact,init_amount,Address,acc_type) VALUES 
    ('$fname','$lname','$email','$password','$username','$city','$dob','$phone','$init_amount','$address','$acc_type')"; 
    $data = mysqli_query ($connect, $query); 
    if($data) 
    { 
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You're registration is completed! You will be notified soon about the confirmation of your account)
        window.location.href='index.html'
        </SCRIPT>");
    }

}
function SignUp(){ 
    if(!empty($_POST['username']))
{  $connect = mysqli_connect("localhost", "root", "", "speedycashf");
        $query = mysqli_query($connect,"SELECT * FROM newcustomer WHERE username = '$_POST[username]' AND password = '$_POST[password]'"); 
        if(!$row = mysqli_fetch_array($query)) 
        { 
            newuser(); 
        } else
        { 
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You are already registered')
            window.location.href='index.html'
            </SCRIPT>"); 
        } 
    } 
} 
if(isset($_POST['submit'])) 
{
    SignUp();
}


?>