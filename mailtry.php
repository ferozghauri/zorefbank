<?php

$msg = "We regret to inform you that due to our low balance policy you out Nigga!";


$msg = wordwrap($msg,70);


mail("k142810@nu.edu.pk","Your Account has been suspended",$msg,"mferozghauri@gmail.com");

$result = mail("k142810@nu.edu.pk","Your Account has been suspended",$msg,"mferozghauri@gmail.com");
if(!$result) {   
     echo "Error";   
} else {
    echo "Success";
}
?>