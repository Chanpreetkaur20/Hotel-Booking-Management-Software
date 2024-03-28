<?php

//hotel_action.php

// include('database_connection.php');
include('function.php');


if(isset($_POST['btn_action'])) 
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO agent_table (agent_name, phone, address, city, status, email, gst) 
		VALUES (:agent_name,:phone,:address,:city,:status,:email,:gst)
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				
					
				':agent_name'			  		=>	$_POST['agent_name'] ,
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
			echo 'New Agent Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')

	{

		
		$query = "
		SELECT * FROM agent_table WHERE agent_id = :agent_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':agent_id'	=>	$_POST["agent_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['agent_name'] = $row['agent_name'];
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
		UPDATE agent_table SET
		agent_name        = '".$_POST["agent_name"]."', 
		phone             = '".$_POST["phone"]."',
        address           = '".$_POST["address"]."',
        city              = '".$_POST["city"]."',
		email              = '".$_POST["email"]."',
		gst              = '".$_POST["gst"]."'
		WHERE agent_id    = '".$_POST["agent_id"]."'
		";
		$statement = $connect->prepare($query);

		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Agent Details Edited';
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
		UPDATE agent_table 
		SET status = :status 
		WHERE agent_id = :agent_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'	    =>	$status,
				':agent_id'		=>	$_POST["agent_id"]
			)
		);	 
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Agent Status change to ' . $status;
		}
	}
	
}


?>