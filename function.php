<?php
//function.php
include('database_connection.php');

function InsertRecord()
    {
        global $con;
        $UserName = $_POST['UName'];
        $UserEmail = $_POST['UEmail'];
        
        //$query = " insert into user_record (UserName,UserEmail) values('$UserName','$UserEmail')";
        //$result= mysqli_query($con,$query);
		$result ='hello';
        if($result)
        {
            echo ' Your Record Has Been Saved in the Database';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
	
	function display_record($payid)
    {
        global $connect;
		// print_r($_REQUEST);
        $value = "";
        $value = '<table class="table table-bordered">
                    <tr>
                        <td> ID </td>
                        <td> Cash </td>
                        <td> Bank </td>
                        <td> Hotel </td>
                        <td> Received by </td>
						<td> Date Of Receiving </td>
						
                    </tr>';
        $query = "select * from sub_pay where pay_id =".$payid;

		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$data = array();
		$filtered_rows = $statement->rowCount();
        // $result = mysqli_query($con,$query);
        
        foreach($result as $row)
		{
            $value.= ' <tr>
                            <td> '.$row['id'].' </td>
                            <td> '.$row['cash'].' </td>
							<td> '.$row['bank'].' </td>
                            <td> '.$row['hotel'].'</td>
							<td> '.$row['received_by'].' </td>
							<td> '.$row['dor'].' </td>
                            
                        </tr>';
        }
        $value.='</table>';
        echo json_encode(['status'=>'success','html'=>$value]);
    }

    // Get Particular Record
    function get_record()
    {
        global $con;
		
        $UserID = @$_POST['UserID'];
        $query = "select * from payment where pay_id= ".$UserID;
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
			
            $User_data =array();
			
            $User_data[0]=$row['pay_id'];
            $User_data[1]=$row['cash'];
            $User_data[2]=$row['bank'];
			$User_data[3]=$row['hotel'];
			$User_data[4]=$row['received_by'];
			$User_data[5]=$row['dor'];
			
        }
		
        echo json_encode($User_data);
    }


    // Update Function
    function update_value()
    {
        global $con;
        $Update_ID = $_POST['U_ID'];
        $Update_cash =$_POST['U_User'];
        $Update_bank = $_POST['U_Email'];
		$Update_hotel = $_POST['U_Email'];
		$Update_received = $_POST['U_Email'];
		$Update_dor = $_POST['U_Dor'];

        $query = "UPDATE `payment` SET `cash`=".$Update_cash.",`bank`=".$Update_bank.",`hotel`=".$Update_hotel.",
		`received_by`=".$Update_received.",`dor`=".$Update_dor." where `pay_id`=".$Update_ID;
        $result = mysqli_query($con,$query);
        if($result)
        {
            echo ' Your Record Has Been Updated ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }

    function delete_record()
    {
        global $connect;
        $Del_Id = $_POST['Del_ID'];
        $query = "delete from sub_pay where id=".$Del_Id;
		$statement = $connect->prepare($query);
		$result = $statement->fetchAll();	
        

        if($result)
        {
            echo ' Your Record Has Been Delete ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }




























function fill_hotel_list($connect)
{
	$query = "
	SELECT * FROM hotel_table 
	WHERE status = 'Active' 
	ORDER BY hname ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["hname"].'">'.$row["hname"].'</option>';
	}
	return $output;
}
function fill_agent_list($connect)
{
	$query = "
	SELECT * FROM agent_table 
	WHERE status = 'Active' 
	ORDER BY agent_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["agent_name"].'">'.$row["agent_name"].'</option>';
	}
	return $output;
}

function fill_source_list($connect)
{
	$query = "
	SELECT * FROM source_table 
	WHERE status = 'Active' 
	ORDER BY source_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["source_name"].'">'.$row["source_name"].'</option>';
	}
	return $output;
}

function fill_user_list($connect)
{
	$query = "
	SELECT * FROM user_details 
	WHERE user_status = 'Active' 
	ORDER BY user_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["user_name"].'">'.$row["user_name"].'</option>';
	}
	return $output;
}

function fill_brand_list($connect, $category_id)
{
	$query = "SELECT * FROM brand 
	WHERE brand_status = 'active' 
	AND category_id = '".$category_id."'
	ORDER BY brand_name ASC";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<option value="">Select Brand</option>';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["brand_id"].'">'.$row["brand_name"].'</option>';
	}
	return $output;
}

// function get_user_name($connect, $user_id)
// {
// 	$query = "
// 	SELECT user_name FROM user_details WHERE user_id = '".$user_id."'
// 	";
// 	$statement = $connect->prepare($query);
// 	$statement->execute();
// 	$result = $statement->fetchAll();
// 	foreach($result as $row)
// 	{
// 		return $row['user_name'];
// 	}
// }

function fill_product_list($connect)
{
	$query = "
	SELECT * FROM guest_table 
	WHERE user_status = 'active' 
	ORDER BY customer_name ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["user_id"].'">'.$row["customer_name"].'</option>';
	}
	return $output;
}

function fetch_product_details($product_id, $connect)
{
	$query = "
	SELECT * FROM guest_table 
	WHERE user_id = '".$product_id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['product_name'] = $row["product_name"];
		$output['quantity'] = $row["product_quantity"];
		$output['price'] = $row['product_base_price'];
		$output['tax'] = $row['product_tax'];
	}
	return $output;
}


function get_user_id($connect, $name)
{

	$query = "
	SELECT user_id FROM user_details WHERE user_name = :user_name
	";
	$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':user_name'	=>	$name
			)
		);
	$result = $statement->fetchAll();
	$aa = $result[0]['user_id'];
	
	return $aa;
}

function get_rooms($connect, $fest_id)
{

	$query = "
	SELECT rooms FROM fest_table WHERE fest_id = :fest_id
	";
	$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':fest_id'	=>	$fest_id
			)
		);
	$result = $statement->fetchAll();
	$aa = $result[0]['rooms'];
	
	return $aa;
}
function get_rooms1($connect, $prep_id)
{
	
	$query = "
	SELECT rooms FROM prep_table WHERE prep_id = :prep_id
	";
	$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':prep_id'	=>	$prep_id
			)
		);
	$result = $statement->fetchAll();
	$aa = $result[0]['rooms'];
	
	return $aa;
}

function get_state($connect, $fest_id)
{
	
	$query = "
		UPDATE fest_table 
		SET fest_status = :fest_status 
		WHERE fest_id = :fest_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':fest_status'	=>	"Inactive",
				':fest_id'		=>	$fest_id
			)
		);	 
}

function get_state1($connect, $prep_id)
{
	
	$query = "
		UPDATE prep_table 
		SET prep_status = :prep_status 
		WHERE prep_id = :prep_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':prep_status'	=>	"Inactive",
				':prep_id'		=>	$prep_id
			)
		);	 
}

function count_total_user($connect)
{
	$query = "
	SELECT * FROM user_details WHERE user_status='active'";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_agent($connect)
{
	$query = "
	SELECT * FROM agent_table WHERE status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_bookings($connect)
{
	$query = "
	SELECT * FROM guest_table WHERE booking_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_fb($connect)
{
	$query = "
	SELECT * FROM fest_table WHERE fest_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}


function count_total_pp($connect)
{
	$query = "
	SELECT * FROM prep_table WHERE prep_status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_hotel($connect)
{
	$query = "
	SELECT * FROM hotel_table WHERE status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_total_source($connect)
{
	$query = "
	SELECT * FROM source_table WHERE status='active'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $statement->rowCount();
}

function count_profit($connect)
{
	$query = "
	SELECT sum(profit) as total_profit FROM guest_table 
	WHERE status='active'
	";
	if($_SESSION['typee1'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_profit'], 2);
	}
}

function count_total_cash_order_value($connect)
{
	$query = "
	SELECT sum(inventory_order_total) as total_order_value FROM inventory_order 
	WHERE payment_status = 'cash' 
	AND inventory_order_status='active'
	";
	if($_SESSION['typee1'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function count_total_credit_order_value($connect)
{
	$query = "
	SELECT sum(inventory_order_total) as total_order_value FROM inventory_order WHERE payment_status = 'credit' AND inventory_order_status='active'
	";
	if($_SESSION['typee1'] == 'user')
	{
		$query .= ' AND user_id = "'.$_SESSION["user_id"].'"';
	}
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return number_format($row['total_order_value'], 2);
	}
}

function get_user_wise_total_order($connect)
{
	$query = '
	SELECT sum(inventory_order.inventory_order_total) as order_total, 
	SUM(CASE WHEN inventory_order.payment_status = "cash" THEN inventory_order.inventory_order_total ELSE 0 END) AS cash_order_total, 
	SUM(CASE WHEN inventory_order.payment_status = "credit" THEN inventory_order.inventory_order_total ELSE 0 END) AS credit_order_total, 
	user_details.user_name 
	FROM inventory_order 
	INNER JOIN user_details ON user_details.user_id = inventory_order.user_id 
	WHERE inventory_order.inventory_order_status = "active" GROUP BY inventory_order.user_id
	';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th>User Name</th>
				<th>Total Order Value</th>
				<th>Total Cash Order</th>
				<th>Total Credit Order</th>
			</tr>
	';

	$total_order = 0;
	$total_cash_order = 0;
	$total_credit_order = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right">$ '.$row["order_total"].'</td>
			<td align="right">$ '.$row["cash_order_total"].'</td>
			<td align="right">$ '.$row["credit_order_total"].'</td>
		</tr>
		';

		$total_order = $total_order + $row["order_total"];
		$total_cash_order = $total_cash_order + $row["cash_order_total"];
		$total_credit_order = $total_credit_order + $row["credit_order_total"];
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b>$ '.$total_order.'</b></td>
		<td align="right"><b>$ '.$total_cash_order.'</b></td>
		<td align="right"><b>$ '.$total_credit_order.'</b></td>
	</tr></table></div>
	';
	return $output;
}


function total_profit($connect)
{
	$query = '
	SELECT sum(guest_table.profit) as total_profit, 
 
	user_details.user_name 
	FROM guest_table 
	INNER JOIN user_details ON user_details.user_id = guest_table.user_id 
	WHERE guest_table.booking_status = "active" GROUP BY guest_table.user_id
	';
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<tr>
				<th class="special-header">User Name</th>
				<th class="special-header">Total Profit</th>
				
			</tr>
	';

	$total_profit = 0;
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row['user_name'].'</td>
			<td align="right">Rs '.$row["total_profit"].'</td>
		
		</tr>
		';

		$total_profit = $total_order + $row["total_profit"];
		
	}
	$output .= '
	<tr>
		<td align="right"><b>Total</b></td>
		<td align="right"><b>Rs '.$total_profit.'</b></td>
	
	</tr></table></div>
	';
	return $output;
}

?>