<?php  
 $connect = mysqli_connect("localhost", "root", "", "speedycashf");  
 $output = '';  
 $sql = "SELECT * FROM newcustomer";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      
           <table class="table table-hover">  
                <tr>  
                     <th width="30%">Name</th>  
                     <th width="30%"></th>  
                     <th width="30%"></th>  
                     <th width="10%"></th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["First_name"].'</td>  
                     <td><button  type="button" id="'.$row["Cust_no"].'" class="btn  btn_show">Show Profile</button></td>  
                     <td><button style="background-color: green; color: white;" type="button" id="'.$row["Cust_no"].'" class="btn  btn_accept">Accept</button></td>  
                     <td><button style="background-color: red; color: white;" type="button" id="'.$row["Cust_no"].'" class="btn  btn_reject">Reject</button></td>  
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