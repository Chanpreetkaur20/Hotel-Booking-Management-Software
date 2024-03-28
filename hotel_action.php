<?php

//hotel_action.php

// include('database_connection.php');
include('function.php');


if(isset($_POST['btn_action'])) 
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO hotel_table (hname, location, status, sperson, mobile_no, gst_no, email_id, sp_dob) 
		VALUES (:hname,:location,:status,:sperson,:mobile_no,:gst_no,:email_id,:sp_dob)
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				
					
				':hname'			  		    =>	$_POST['hname'] ,
				':location'				    	=>	$_POST['location'], 
				':sperson'				    	=>	$_POST['sperson'],
				':mobile_no'				    =>	$_POST['mob'],
				':gst_no'				    	=>	$_POST['gst_no'],
				':email_id'				    	=>	$_POST['mail'],
				':sp_dob'				    	=>	$_POST['sp_dob'],
				':status'       				=>	'Active' 
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Hotel Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')

	{

		
		$query = "
		SELECT * FROM hotel_table WHERE hotel_id = :hotel_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':hotel_id'	=>	$_POST["hotel_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['hname'] = $row['hname'];
			$output['location'] = $row['location'];
			$output['sperson'] = $row['sperson'];
			$output['mob'] = $row['mobile_no'];
			$output['gst_no'] = $row['gst_no'];
			$output['mail'] = $row['email_id'];
			$output['sp_dob'] = $row['sp_dob'];
			
		}
		echo json_encode($output);
	}


	if($_POST['btn_action'] == 'Edit')
	{	
		$query = "
		UPDATE hotel_table SET
		hname          = '".$_POST["hname"]."', 
		location          = '".$_POST["location"]."',
		sperson          = '".$_POST["sperson"]."',
		mobile_no          = '".$_POST["mob"]."',
		gst_no          = '".$_POST["gst_no"]."',
		email_id          = '".$_POST["mail"]."',
		sp_dob          = '".$_POST["sp_dob"]."'
		WHERE hotel_id    = '".$_POST["hotel_id"]."'
		";
		$statement = $connect->prepare($query);

		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Hotel Details Edited';
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
		UPDATE hotel_table 
		SET status = :status 
		WHERE hotel_id = :hotel_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':status'	    =>	$status,
				':hotel_id'		=>	$_POST["hotel_id"]
			)
		);	 
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Hotel Status change to ' . $status;
		}
	}
	
}


?>