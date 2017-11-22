<?php  
session_start();
$u=$_SESSION['inuser'];
$p=$_SESSION['pass'];
 $connect = mysqli_connect("localhost", "root", "", "zorefbank");  
 $output = '';  
 $sql = "(SELECT * FROM bills where Acc_no = (SELECT Acc_no from account where Cust_no=(Select Cust_no from userrole where Username='$u' and Password='$p')))";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      
           <table class="table table-hover">  
                <tr>  
                     <th width="30%">Company</th>  
                     <th width="30%">Amount</th>  
                     <th width="30%">Due Date</th>  
                     <th width="10%">Pay Bill</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["Biller_no"].'</td>  
                     <td class="bill_amount" data-id="'.$row["Bill_no"].'">'.$row["Amount"].'</td>  
                     <td class="due" data-id="'.$row["Bill_no"].'" >'.$row["Due"].'</td>  
                     <td><button type="button" name="delete_btn" data-id="'.$row["Bill_no"].'" class="btn btn-success btn_delete">PAY</button></td>  
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