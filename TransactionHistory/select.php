<?php 
 session_start();
 $u=$_SESSION['inuser'];
 $p=$_SESSION['pass'];
 $connect = mysqli_connect("localhost", "root", "", "zorefbank");  
 $output = '';  
 $sql = "(SELECT * FROM acc2acc a where Acc_no=(SELECT a.Acc_no FROM account a, userrole c WHERE c.Username = '$u' and c.Password='$p' and c.Cust_no=a.Cust_no))";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      
           <table class="table table-hover">  
                <tr>  
                     <th width="30%">Amount</th>  
                     <th width="35%">Reciever</th>  
                     <th width="35%">Time</th> 
                </tr>';  
 if(mysqli_num_rows($result) > 0)   
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["Amount"].'</td>  
                     <td class="acc_reciever" data-id1="'.$row["T_id"].'">'.$row["Reciever_acc_no"].'</td>  
                     <td class="time_trans" data-id2="'.$row["T_id"].'" >'.$row["DateTime"].'</td>    
                </tr>  
           ';  
      }  
      
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">No Transactions</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  