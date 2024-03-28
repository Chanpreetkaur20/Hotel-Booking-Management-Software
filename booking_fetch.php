<?php

//booking_fetch.php

// include('database_connection.php');
include('function.php');

$query = ''; 

$output = array();

$query .= "
SELECT * FROM guest_table WHERE
";
if($_SESSION['typee1'] == 'user')
{
	$query .= 'user_id = "'.$_SESSION["user_id"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
	$query .= '(booking_id LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR guest_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hotel_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR source_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR agent LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR chk_in LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR chk_out LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR rooms LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bed LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR child LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR meal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prate LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR srate LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR booking_status LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR doc LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR gst LIKE "%'.$_POST["search"]["value"].'%" )';
}

if(isset($_POST["order"]))
{
	// print_r($_POST);
	// echo $_POST['order']['0']['column'];
	// echo $_POST['order']['0']['dir'];
	if ($_POST['order']['0']['column']== 0){

		if($_POST['order']['0']['dir']=='desc'){
		$query .= 'ORDER BY booking_id desc ';
		}
		else{
		$query .= 'ORDER BY booking_id asc ';

		}

	}
	else{
	
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

	}
}
else
{
	$query .= 'ORDER BY booking_id ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$status = '';
	if($row["booking_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['booking_id'];
	$sub_array[] = $row['agent'];
	$sub_array[] = $row['hotel_name'];
	$sub_array[] = $row['source_name'];
	$sub_array[] = $row['guest_name'];
	$sub_array[] = $row['chk_in'];
	$sub_array[] = $row['chk_out'];
	$sub_array[] = $row['rooms'];
	$sub_array[] = $row['bed'];
	$sub_array[] = $row['child'];
	$sub_array[] = $row['meal'];
	$sub_array[] = $row['prate'];
	$sub_array[] = $row['srate'];
	$sub_array[] = $row['profit'];
	$sub_array[] = $status;
    $sub_array[] = $row['doc'];

	$sub_array[] = '<button type="button" name="update" id="'.$row["booking_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="payment" id="'.$row["booking_id"].'" class="btn btn-success btn-xs payment">Payment</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["booking_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["booking_status"].'">Delete</button>';
    $sub_array[] = '<button type="button" name="addm" id="'.$row["booking_id"].'" class="btn btn-warning btn-xs addm">Add More</button>';
    

	if($_SESSION['typee1'] == 'master') 
	{
		$sub_array[] = get_user_name($connect, $row['user_id']);
	}
	$data[] = $sub_array;

	
}


$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);
echo json_encode($output);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM guest_table");
	$statement->execute();
	return $statement->rowCount();
}

function get_user_name($connect, $user_id)
{
	$query = "
	SELECT user_name FROM user_details WHERE user_id = '".$user_id."'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['user_name'];
	}
}
?>
