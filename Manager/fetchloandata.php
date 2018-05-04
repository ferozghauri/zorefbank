<?php  
session_start();
 $connect = mysqli_connect("localhost", "root", "", "zorefbank");  
 $output = '';  
 $sql = "SELECT * FROM loanapplications";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      
           <table class="table table-hover">  
                <tr>  
                     <th width="30%">Account number</th>  
                     <th width="30%">amount</th>  
                     <th width="30%">Accept</th>  
                     <th width="10%">Reject</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
        
                     <td class="bill_amount" data-id="'.$row["L_id"].'">'.$row["Acc_no"].'</td>  
                     <td class="due" data-id="'.$row["L_id"].'" >'.$row["amount"].'</td>  
                     <td><button type="button" name="accept_btn" data-id="'.$row["L_id"].'" class="btn btn-success btn_delete">Accept</button></td>
                     <td><button type="button" name="reject_btn" data-id="'.$row["L_id"].'" class="btn btn-danger btn_delete">Reject</button></td> 
                </tr>  
           ';  
      }  
      
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">No Entries</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  