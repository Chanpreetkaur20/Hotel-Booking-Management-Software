<?php

//booking_action.php

// include('database_connection.php');
include('function.php');


if(isset($_POST['btn_action'])) 
{
	if($_POST['btn_action'] == 'Add')
	{
		
		$subtotal = ($_POST['srate'] - $_POST['prate']);
		$tax = $subtotal * ($_POST['gst'] / 100);
		$grand = $subtotal - $tax;
	 	$query = "
		INSERT INTO guest_table (guest_name, hotel_name, chk_in, chk_out, rooms, bed,child, meal, prate, srate, gst, profit, booking_status, user_id, doc, agent, sub_id,source_name) 
		VALUES (:guest_name,:hotel_name,:chk_in,:chk_out,:rooms,:bed,:child,:meal,:prate,:srate,:gst,:pfit,:booking_status,:user_id,:doc, :agent, :subb, :source_name)
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				
				':user_id'						=>	$_SESSION['user_id'] ,	
				':guest_name'			  		=>	$_POST['guest_name'] ,
				':hotel_name'					=>	$_POST['hotel_name'],
				':source_name'					=>	$_POST['source_name'],
				':chk_in'						=>	$_POST['chk_in'] ,
				':chk_out'						=>	$_POST['chk_out'] ,
				':rooms'						=>	$_POST['rooms'] ,
				':bed'							=>	$_POST['bed'] ,
				':child'							=>	$_POST['child'] ,
				':meal'							=>	$_POST['meal'] ,
				':prate'						=>	$_POST['prate'] ,
				':srate'						=>	$_POST['srate'] ,
				':gst'							=>	$_POST['gst'] ,
				':agent'						=>	$_POST['agent'] ,
				':subb'					    	=>  0 ,
				':booking_status'				=>	'Active' ,
				':doc'							=>	date("Y-m-d"),
				':pfit'                         =>	$grand
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			//echo 'New Booking Added';
		}
		
		
		
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
	if($_POST['btn_action'] == 'addm')
	{
		
		$subtotal = ($_POST['srate'] - $_POST['prate']);
		$tax = $subtotal * ($_POST['gst'] / 100);
		$grand = $subtotal - $tax;
		$query = "
		INSERT INTO guest_table (guest_name, hotel_name, chk_in, chk_out, rooms, bed,child, meal, prate, srate, gst, profit, booking_status, user_id, doc, agent, sub_id, source_name) 
		VALUES (:guest_name,:hotel_name,:chk_in,:chk_out,:rooms,:bed,:child,:meal,:prate,:srate,:gst,:pfit,:booking_status,:user_id,:doc, :agent, :sub, :source_name)
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				
				':user_id'						=>	$_SESSION['user_id'] ,	
				':guest_name'			  		=>	$_POST['guest_name'] ,
				':hotel_name'					=>	$_POST['hotel_name'], 
				':source_name'					=>	$_POST['source_name'], 
				':chk_in'						=>	$_POST['chk_in'] ,
				':chk_out'						=>	$_POST['chk_out'] ,
				':rooms'						=>	$_POST['rooms'] ,
				':bed'							=>	$_POST['bed'] ,
				':child'							=>	$_POST['child'] ,
				':meal'							=>	$_POST['meal'] ,
				':prate'						=>	$_POST['prate'] ,
				':srate'						=>	$_POST['srate'] ,
				':gst'							=>	$_POST['gst'] ,
				':agent'						=>	$_POST['agent'] ,
				':booking_status'				=>	'Active' ,
				':doc'							=>	date("Y-m-d"),
				':sub'							=>	$_POST['booking_id'],
				':pfit'                         =>	$grand
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			//echo 'New Booking Added';
		}
		

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
	if($_POST['btn_action'] == 'fetch_single')

	{

		
		$query = "
		SELECT * FROM guest_table WHERE booking_id = :booking_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':booking_id'	=>	$_POST["booking_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['hotel_name'] = $row['hotel_name'];
			$output['source_name'] = $row['source_name'];
			$output['agent'] = $row['agent'];
			$output['guest_name'] = $row['guest_name'];
			$output['chk_in'] = $row['chk_in'];
			$output['chk_out'] = $row['chk_out'];
			$output['rooms'] = $row['rooms'];
			$output['bed'] = $row['bed'];
			$output['child'] = $row['child'];
			$output['meal'] = $row['meal'];
			$output['prate'] = $row['prate'];
			$output['srate'] = $row['srate'];
			$output['gst'] = $row['gst'];
		}
		echo json_encode($output);
	}

	if($_POST['btn_action'] == 'fetch_single1')

	{
	    $query = "
		UPDATE payment SET
		booking_id          = '".$_POST["booking_id"]."'
		WHERE pay_id    = '".$_POST["pay_id"]."'
		";
		$statement = $connect->prepare($query);

		$statement->execute();
		$result = $statement->fetchAll();
		
		
		$query = "
		SELECT * FROM payment WHERE pay_id = :pay_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':pay_id'	=>	$_POST["pay_id"]
			)
		);
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['cash'] = $row['cash'];
			$output['bank'] = $row['bank'];
			$output['hotel'] = $row['hotel'];
			$output['received_by'] = $row['received_by'];
			$output['dor'] = $row['dor'];
		}
		echo json_encode($output);
	}



	if($_POST['btn_action'] == 'Edit')
	{	
		$subtotal = ($_POST['srate'] - $_POST['prate']);
		$tax = $subtotal * ($_POST['gst'] / 100);
		$grand = $subtotal - $tax;
		$query = "
		UPDATE guest_table SET
		guest_name          = '".$_POST["guest_name"]."', 
		hotel_name          = '".$_POST["hotel_name"]."',
		source_name          = '".$_POST["source_name"]."',
		agent 		        = '".$_POST["agent"]."',
		chk_in              = '".$_POST["chk_in"]."',
		chk_out             = '".$_POST["chk_out"]."', 
		rooms               = '".$_POST["rooms"]."', 
		bed                 = '".$_POST["bed"]."', 
		child                 = '".$_POST["child"]."', 
		meal                = '".$_POST["meal"]."', 
		prate               = '".$_POST["prate"]."', 
		srate               = '".$_POST["srate"]."',
		profit				= $grand,
		gst                 = '".$_POST["gst"]."' 
		WHERE booking_id    = '".$_POST["booking_id"]."'
		";
		$statement = $connect->prepare($query);

		$statement->execute();
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Booking Details Edited';
		}
	}

	if($_POST['btn_action'] == 'ADD')
	{	







		$query = "
		INSERT INTO sub_pay (pay_id, booking_id, user_id, cash, bank, hotel, received_by, dor) 
		VALUES (:pay_id, :booking_id, :user_id, :cash, :bank, :hotel, :received_by, :dor)
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				
				':user_id'						=>	$_SESSION['user_id'] ,	
				':pay_id'    			  		=>	$_POST['pay_id'] ,
				':booking_id'					=>	$_POST['booking_id'], 
				':cash'							=>	$_POST['cash'] ,
				':bank'							=>	$_POST['bank'] ,
				':hotel'						=>	$_POST['hotel'] ,
				':received_by'					=>	$_POST['received_by'] ,
				':dor'							=>	$_POST['dor'] 
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Payment Details Added';
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
		UPDATE guest_table 
		SET booking_status = :booking_status 
		WHERE booking_id = :booking_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':booking_status'	=>	$status,
				':booking_id'		=>	$_POST["booking_id"]
			)
		);	 
		$result = $statement->fetchAll();	
		if(isset($result))
		{
			echo 'Booking Status change to ' . $status;
		}
	}
	
}


?>