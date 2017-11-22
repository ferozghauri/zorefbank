<?php  
session_start();
$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];
 $connect = mysqli_connect("localhost", "root", "", "zorefbank");  
 $output = '';  
 $sql = "(SELECT * FROM bills where Acc_no = (SELECT Acc_no from account where Cust_no=(Select Cust_no from userrole where Username='$u' and Password='$p')))";  
 $result = mysqli_query($connect, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>
                    <td><h4 id="bi"><b>YOU HAVE A NEW BILL</b></h4><p> From: <a>'.$row["Biller_no"].'</a> <br>Amount: <a>'.$row["Amount"].'</a> <br>Due: <a>'.$row["Due"].'</a> </p></td>
                </tr>  
           ';  
      }  
      
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">No new notifications</td>  
                     </tr>';  
 }  
  
 echo $output;  
 ?>  