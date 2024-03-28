<?php

//source_action.php

// include('database_connection.php');
include('function.php');


if(isset($_POST['btn_action'])) 
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO source_table (source_name, phone, address, city, status, email, gst) 
		VALUES (:source_name,:phone,:address,:city,:status,:email,:gst)
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				
					
				':source_name'			  		=>	$_POST['source_name'] ,
				':phone'				    	=>	$_POST['phone'],
                ':address'			  		    =>	$_POST['address'] ,
				':city'				    	    =>	$_POST['city'], 
				':email'				        =>	$_POST['email'], 
				':gst'				    	    =>	$_POST['gst'], 
				':status'       				=>	'Active' 
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New source Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')

	{

		
		$query = "
		SELECT * FROM source_table WHERE source_id = :source_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':source_id'	=>	$_POST["source_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['source_name'] = $row['source_name'];
			$output['phone'] = $row['phone'];
            $output['address'] = $row['address'];
			$output['city'] = $row['city'];
			$output['email'] = $row['email'];
			$output['gst'] = $row['gst'];
		}
		echo json_encode($output);
	}


	if($_POST['btn_action'] == 'Edit')
	{	
		$query = "
		UPDATE source_table SET
		source_name        = '".$_POST["source_name"]."', 
		phone             = '".$_POST["phone"]."',
        address           = '".$_POST["address"]."',
        city              = '".$_POST["city"]."',
		email              = '".$_POST["email"]."',
		gst              = '".$_POST["gst"]."'
		WHERE source_id    = '".$_POST["source_id"]."'
		";
		$statement = $connect->prepare($query);

		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'source Details Edited';
		}
	}
	if($_POST['btn_action'] == 'delete')
	{
		$status = 'Active';
		if($_POST['status'] == 'Active')
		{
			$status = 'Inactive';
		}
		if($_POST['status'] == 'Inactive')
		{
			$status = 'Active';
		}
		$query = "
		UPDATE source_table 
		SET status = :status 
		WHERE source_id = :source_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'	    =>	$status,
				':source_id'		=>	$_POST["source_id"]
			)
		);	 
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'source Status change to ' . $status;
		}
	}
	
}


?>