<?php

//agent_fetch.php

// include('database_connection.php');
include('function.php');


$query = '';

$output = array();

$query .= "SELECT * FROM agent_table ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE agent_name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR phone LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR address LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR city LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR email LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR gst LIKE "%'.$_POST["search"]["value"].'%" ';

	$query .= 'OR status LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST['order']))
{
	if ($_POST['order']['0']['column']== 0){

		if($_POST['order']['0']['dir']=='desc'){
		$query .= 'ORDER BY agent_id desc ';
		}
		else{
		$query .= 'ORDER BY agent_id asc ';

		}

	}
	else{
	
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

	}
}
else
{
	$query .= 'ORDER BY agent_id ';
}

if($_POST['length'] != -1)
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
	if($row['status'] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['agent_id'];
    $sub_array[] = $row['agent_name'];
	$sub_array[] = $row['phone'];
	$sub_array[] = $row['address'];
    $sub_array[] = $row['city'];
    $sub_array[] = $row['email'];
    $sub_array[] = $row['gst'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["agent_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["agent_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["status"].'">Delete</button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"				=>	$data
);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM agent_table");
	$statement->execute();
	return $statement->rowCount();
}

echo json_encode($output);

?> 