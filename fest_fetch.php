<?php

//fest_fetch.php

// include('database_connection.php');
include('function.php');
$query = ''; 

$output = array();
$query .= "
	SELECT * FROM fest_table Where
";

if($_SESSION['typee1'] == 'user')
{
	$query .= 'user_id = "'.$_SESSION["user_id"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
	$query .= '(fest_id LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR fest LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hotel_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR chk_in LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR chk_out LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR rooms LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bed LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR meal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prate LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR lst_dt LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR fest_status LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR gst LIKE "%'.$_POST["search"]["value"].'%" )';
}

if(isset($_POST["order"]))
{
	if ($_POST['order']['0']['column']== 0){

		if($_POST['order']['0']['dir']=='desc'){
		$query .= 'ORDER BY fest_id desc ';
		}
		else{
		$query .= 'ORDER BY fest_id asc ';

		}

	}
	else{
	
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

	}
}
else
{
	$query .= 'ORDER BY fest_id ';
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
	if($row["fest_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
    $now = date("Y-m-d");
    $ref = $row['lst_dt'];

    $diff1 = strtotime($ref) - strtotime($now);
    $dif = abs(round($diff1 / 86400));
	if ($now > $ref){
		$dif = 0;
		get_state($connect,$row['fest_id']);
		$status = '<span class="label label-danger">Inactive</span>';
	}
  
	$sub_array = array();
	$sub_array[] = $row["fest_id"];
    $sub_array[] = $row['fest'];
	$sub_array[] = $row['hotel_name'];
	$sub_array[] = $row['chk_in'];
	$sub_array[] = $row['chk_out'];
	$sub_array[] = $row['rooms'];
	$sub_array[] = $row['bed'];
	$sub_array[] = $row['meal'];
	$sub_array[] = $row['prate'];
	$sub_array[] = $row['lst_dt'];
	$sub_array[] = $dif;
	$sub_array[] = $status;
    $sub_array[] = $row['doc'];
	
	$sub_array[] = '<button type="button" name="update" id="'.$row["fest_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="book" id="'.$row["fest_id"].'" class="btn btn-success btn-xs book">Add To Booking</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["fest_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["fest_status"].'">Delete</button>';
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
	$statement = $connect->prepare("SELECT * FROM fest_table");
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