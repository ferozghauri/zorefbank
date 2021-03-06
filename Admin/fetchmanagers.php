<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "zorefbank");
$columns = array('First_name', 'Last_name');

$query = "SELECT * FROM Customer where Cust_no IN (SELECT Cust_no FROM userrole where role = 'manager')";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE First_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR Last_name LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY Cust_no DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);


$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div class="update" data-id="'.$row["Cust_no"].'" data-column="First_Name">' . $row["First_name"] . '</div>';
 $sub_array[] = '<div class="update" data-id="'.$row["Cust_no"].'" data-column="Last_name">' . $row["Last_name"] . '</div>';
 $sub_array[] = '<button type="button" name="show" class="btn" id="'.$row["Cust_no"].'">Show Profile</button>';
 $sub_array[] = '<button style="background-color: red; color: white;" type="button" name="delete" class="btn" id="'.$row["Cust_no"].'">Remove</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM Customer where Cust_no IN (SELECT Cust_no FROM userrole where role = 'manager')";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
