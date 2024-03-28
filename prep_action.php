<?php

//prep_action.php

// include('database_connection.php');
include('function.php');

if(isset($_POST['btn_action'])) 
{
	if($_POST['btn_action'] == 'Add')
	{
		
		$query = "
		INSERT INTO prep_table (hotel_name, chk_in, chk_out, rooms, bed, prate, lst_dt, gst, prep_status, doc, user_id, meal) 
		VALUES (:hotel_name,:chk_in,:chk_out,:rooms,:bed,:prate,:lst_dt,:gst,:prep_status,:doc,:user_id,:meal)
		";
        	
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				
				':user_id'						=>	$_SESSION['user_id'] ,	
				
				':hotel_name'					=>	$_POST['hotel_name'], 
				':chk_in'						=>	$_POST['chk_in'] ,
				':chk_out'						=>	$_POST['chk_out'] ,
				':rooms'						=>	$_POST['rooms'] ,
				':bed'							=>	$_POST['bed'] ,
				':meal'							=>	$_POST['meal'] ,
				':prate'						=>	$_POST['prate'] ,
				':lst_dt'						=>	$_POST['lst_dt'] ,
				':gst'							=>	$_POST['gst'] ,
				':prep_status'				    =>	'Active' ,
				':doc'							=>	date("Y-m-d")
				
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'New Pre Purchase Added';
		}
	}
	if($_POST['btn_action'] == 'fetch_single')

	{

		
		$query = "
		SELECT * FROM prep_table WHERE prep_id = :prep_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':prep_id'	=>	$_POST["prep_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['hotel_name'] = $row['hotel_name'];
			
			$output['chk_in'] = $row['chk_in'];
			$output['chk_out'] = $row['chk_out'];
			$output['rooms'] = $row['rooms'];
			$output['bed'] = $row['bed'];
			$output['meal'] = $row['meal'];
			$output['prate'] = $row['prate'];
			$output['lst_dt'] = $row['lst_dt'];
			$output['gst'] = $row['gst'];
		}
		echo json_encode($output);
	}


	if($_POST['btn_action'] == 'Edit')
	{
		$query = "
		UPDATE prep_table SET
		 
		hotel_name          = '".$_POST["hotel_name"]."',
		chk_in              = '".$_POST["chk_in"]."',
		chk_out             = '".$_POST["chk_out"]."', 
		rooms               = '".$_POST["rooms"]."', 
		bed                 = '".$_POST["bed"]."', 
		meal                = '".$_POST["meal"]."', 
		prate               = '".$_POST["prate"]."', 
		lst_dt               = '".$_POST["lst_dt"]."', 
		gst                 = '".$_POST["gst"]."' 
		WHERE prep_id    = '".$_POST["prep_id"]."'
		";
		$statement = $connect->prepare($query);

		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Pre Purchase Details Edited';
		}
	}

	if($_POST['btn_action'] == 'Insert')
	{
		
	
		$ss = get_rooms1($connect,$_POST['prep_id']);
	
		$a = $_POST["room"];
		$m = $ss-$a;
		
		
		$subtotal = ($_POST['srat'] - $_POST['prat']);
		$tax = $subtotal * ($_POST['gstt'] / 100);
		$grand = $subtotal - $tax;
		$query1 = "
		INSERT INTO guest_table (guest_name, hotel_name, chk_in, chk_out, rooms, bed, meal, prate, srate, gst, profit, booking_status, user_id, doc, agent) 
		VALUES (:guest_name,:hotel_name,:chk_in,:chk_out,:rooms,:bed,:meal,:prate,:srate,:gst,:pfit,:booking_status,:user_id,:doc, :agent)
		";
		
		$statement = $connect->prepare($query1);
		$statement->execute(
			array(
				
				':user_id'						=>	$_SESSION['user_id'] ,	
				':guest_name'			  		=>	$_POST['guest_n'] ,
				':hotel_name'					=>	$_POST['hotel_n'], 
				':chk_in'						=>	$_POST['chkin'] ,
				':chk_out'						=>	$_POST['chkout'] ,
				':rooms'						=>	$_POST['room'] ,
				':bed'							=>	$_POST['bedd'] ,
				':meal'							=>	$_POST['meals'] ,
				':prate'						=>	$_POST['prat'] ,
				':srate'						=>	$_POST['srat'] ,
				':gst'							=>	$_POST['gstt'] ,
				':agent'						=>	$_POST['agent'] ,
				':booking_status'				=>	'Active' ,
				':doc'							=>	date("Y-m-d"),
				':pfit'                         =>	$grand
			)
		);
		$result = $statement->fetchAll();
		
		
		$query = "
		UPDATE prep_table SET  
		rooms               = '".$m."' 
		WHERE prep_id    = '".$_POST["prep_id"]."'
		";
		$statement = $connect->prepare($query);

		$statement->execute();
		$result = $statement->fetchAll();
		
		$c = "
		INSERT INTO payment(booking_id, user_id, cash, bank, hotel, received_by, dor) 
		VALUES (:booking_id, :user_id, :cash, :bank, :hotel, :received_by, :dor)
		";
		$state = $connect->prepare($c);
		$state->execute(
			array(
				
				':user_id'					=>	$_SESSION['user_id'] ,
				':cash'						=>	0 ,
				':bank'						=>	0 ,
				':hotel'					=>	0 ,
				':received_by'				=>	" " ,
				':dor'						=>	" " ,
				':booking_id'				=> 	0
			)
		);
		$res = $state->fetchAll();
		if(isset($res))
		{
			echo 'New Booking Added';
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
		UPDATE prep_table 
		SET prep_status = :prep_status 
		WHERE prep_id = :prep_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':prep_status'	=>	$status,
				':prep_id'		=>	$_POST["prep_id"]
			)
		);	 
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Pre Purchase Status change to ' . $status;
		}
	}
	
}


?>