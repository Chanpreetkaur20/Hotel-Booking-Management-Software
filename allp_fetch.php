<?php

//fest_fetch.php

// include('database_connection.php');
include('function.php');
$query = ''; 

$output = array();
$query .= "
	SELECT * FROM prep_table Where
";



if(isset($_POST["search"]["value"]))
{
	$query .= '(prep_id LIKE "%'.$_POST["search"]["value"].'%" ';
    // $query .= 'OR fest LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR hotel_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR chk_in LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR chk_out LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR rooms LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bed LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR meal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prate LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR lst_dt LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR prep_status LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR gst LIKE "%'.$_POST["search"]["value"].'%" )';
}

if(isset($_POST["order"]))
{
	if ($_POST['order']['0']['column']== 0){

		if($_POST['order']['0']['dir']=='desc'){
		$query .= 'ORDER BY prep_id desc ';
		}
		else{
		$query .= 'ORDER BY prep_id asc ';

		}

	}
	else{
	
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';

	}
}
else
{
	$query .= 'ORDER BY prep_id ';
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
	if($row["prep_status"] == 'Active')
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
	$sub_array[] = $row["prep_id"];
    // $sub_array[] = $row['fest'];
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
	$sub_array[] = get_user_name($connect, $row['user_id']);
	
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
	$statement = $connect->prepare("SELECT * FROM prep_table");
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