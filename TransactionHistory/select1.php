<?php  
 session_start();
 $u=$_SESSION['inuser'];
 $p=$_SESSION['pass'];
 $connect = mysqli_connect("localhost", "root", "", "zorefbank");  
 $output = '';  
 $sql = "(SELECT * FROM acc2nacc where Acc_no=(SELECT a.Acc_no FROM account a, userrole c WHERE c.Username = '$u' and c.Password='$p' and c.Cust_no=a.Cust_no))";
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      
           <table class="table table-hover">  
                <tr>  
                     <th width="30%">Amount</th>  
                     <th width="35%">CNIC</th>  
                     <th width="35%">Time</th> 
                     <th width="35%">Status</th> 
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["Amount"].'</td>  
                     <td class="CNIC_receiver" data-id1="'.$row["T_id"].'">'.$row["CNIC"].'</td>  
                     <td class="trans_time" data-id2="'.$row["T_id"].'" >'.$row["DateTime"].'</td> 
                     <td class="status" data-id2="'.$row["Status"].'" >'.$row["Status"].'</td> 
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