<?php 
 session_start();
 $u=$_SESSION['inuser'];
 $p=$_SESSION['pass'];
 $connect = mysqli_connect("localhost", "root", "", "speedycashf");  
 $output = '';  
 $sql = "select company_name from available_billers where Biller_no in (select Biller_no from registered_biller where Cust_no=(select Cust_no FROM customer_login where Username='$u' and Password='$p'))"; 
 $result = mysqli_query($connect, $sql);   
 if(mysqli_num_rows($result) > 0)  
 {  
      while(list($row) = mysqli_fetch_array($result))  
      {  
           if($row == "Electricity"){
               $output .= '  
                <div class="col-lg-2 text-center" >
                <span class="glyphicon glyphicon-flash logo-small"></span>
                <h4>Electricity </h4>
                </div>  
           ';
           }
          if($row == "Gas"){
               $output .= '  
                <div class="col-lg-2 text-center">
                <span class="glyphicon glyphicon-fire logo-small"></span>
                <h4>Gas</h4>
                </div>  
           ';
           }
          if($row == "Phone"){
               $output .= '  
                <div class="col-lg-2 text-center">
                <span class="glyphicon glyphicon-earphone logo-small"></span>
                <h4>Phone</h4>
                </div>  
           ';
           }
          if($row == "Cable"){
               $output .= '  
                <div class="col-lg-2 text-center">
                <span class="glyphicon glyphicon-play logo-small"></span>
                <h4>Cable</h4>
                </div>  
                ';
           }
      }  
      
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">No Payments</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  