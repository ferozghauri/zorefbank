<?php 
 session_start();
 $connect = mysqli_connect("localhost", "root", "", "speedycashf");    
 $sql = "SELECT * FROM customer";  
 $result = mysqli_query($connect, $sql);    
// if(mysqli_num_rows($result) > 0)  
// {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output = '  
                 <tr>  
                        <td>'.$row["Cust_no"].'</td>  
                        <td>'.$row["Branch_code"].'</td>  
                        <td>'.$row["First_name"].'</td>  
                        <td>'.$row["Last_name"].'</td> 
                        <td><button id="'.$row["Cust_no"].'">Click me</button>
                   </tr>   
           ';  
          echo $output; 
      }  
      
// }  
// else  
// {  
//      $output .= '<tr>  
//                          <td colspan="4">No Transactions</td>  
//                     </tr>';  
// }   
  
 ?>  