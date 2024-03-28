<?php
// include('database_connection.php');
include('function.php');
if(!isset($_SESSION["typee1"]))
{
	header('location:login.php');
}
 

include('header.php');
// echo "onw";
// print_r($_POST);
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

<form id = 'report_type'  method = 'post'>
    <div>
<div class="form-group">
					<label>Select Search Type</label>
							<select name="r_type" id="r_type" class="form-control" required>
                            <option value="">Select Search Type</option>
                                            <option value="id">By Booking Id</option>
                                            <option value="guest">By Guest Name</option>
                            </select>
							<label>Enter ID/Name</label>
	<input type="text" name="input" id= 'input' class="form-control" autocomplete="off" required />
</div>
<div class="modal-footer">
        				<input type="hidden" name="btn_action" id="btn_action1" />
        				<input type="submit" name="action1" id="action1" class="btn btn-info" value="get" />
        			</div>
</div>
</form>

<?php
if(@$_POST['r_type'] == 'id'){?>



<?php
// print_r($_POST);
if (isset($_POST['input']))
{
?>
<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="booking_data" class="table table-bordered table-striped" >
                   				<thead>
									<tr>
                                    <th>Booking ID</th>
									<th>Agent Name</th>
									<th>Hotel Name</th>
	    							<th>Customer Name</th>
	    							<th>Check IN</th>
	    							<th>Check OUT</th>
	    							<th>No Of Rooms</th>
	    							<th>Extra Bed</th>
	    							<th>Meal Plan</th>
	    							<th>Purchase Amount</th>
	    							<th>sale Amount</th>
    
	    							<th>Total Profit</th>
	    							<th>Order Status</th>
	    							<th>Booking Date</th>
							    	<th>Created By</th>
									</tr>
								</thead>
                   			
                   		</div>
                   	</div>



<?php

$num = @$_POST['input'];
$query = 'SELECT * FROM guest_table where sub_id = '.$num.' OR booking_id = '.$num;
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)  
{  
	if($row["booking_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}	
?> 
     <tr>  
          <td><?php echo $row["booking_id"]; ?></td>  
          <td><?php echo $row["agent"]; ?></td>
          <td><?php echo $row["hotel_name"]; ?></td>  
          <td><?php echo $row["guest_name"]; ?></td>  
          <td><?php echo $row["chk_in"]; ?></td>  
          <td><?php echo $row["chk_out"]; ?></td>
          <td><?php echo $row["rooms"]; ?></td>
          <td><?php echo $row["bed"]; ?></td>
          <td><?php echo $row["meal"]; ?></td> 
          <td><?php echo $row["prate"]; ?></td> 
          <td><?php echo $row["srate"]; ?></td> 
          <td><?php echo $row["profit"]; ?></td>
          <td><?php echo $status; ?></td>
          <td><?php echo $row["doc"]; ?></td>
          <td><?php echo get_user_name($connect, $row["user_id"]); ?></td>
           
           
              
     </tr>
      
 <?php     
}
?>
</table> 
<?php 
}
}
?> 
<?php
if(@$_POST['r_type'] == 'guest'){?>



<?php
// print_r($_POST);
if (isset($_POST['input']))
{
?>
<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="booking_data" class="table table-bordered table-striped" >
                   				<thead>
									<tr>
                                    <th>Booking ID</th>
									<th>Agent Name</th>
									<th>Hotel Name</th>
	    							<th>Customer Name</th>
	    							<th>Check IN</th>
	    							<th>Check OUT</th>
	    							<th>No Of Rooms</th>
	    							<th>Extra Bed</th>
	    							<th>Meal Plan</th>
	    							<th>Purchase Amount</th>
	    							<th>sale Amount</th>
    
	    							<th>Total Profit</th>
	    							<th>Order Status</th>
	    							<th>Booking Date</th>
							    	<th>Created By</th>
									</tr>
								</thead>
                   			
                   		</div>
                   	</div>



<?php

$num = @$_POST['input'];
$query = 'SELECT * FROM guest_table where guest_name LIKE "%'.$num.'%"';
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)  
{  
	if($row["booking_status"] == 'Active')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}	
?> 
     <tr>  
          <td><?php echo $row["booking_id"]; ?></td>  
          <td><?php echo $row["agent"]; ?></td>
          <td><?php echo $row["hotel_name"]; ?></td>  
          <td><?php echo $row["guest_name"]; ?></td>  
          <td><?php echo $row["chk_in"]; ?></td>  
          <td><?php echo $row["chk_out"]; ?></td>
          <td><?php echo $row["rooms"]; ?></td>
          <td><?php echo $row["bed"]; ?></td>
          <td><?php echo $row["meal"]; ?></td> 
          <td><?php echo $row["prate"]; ?></td> 
          <td><?php echo $row["srate"]; ?></td> 
          <td><?php echo $row["profit"]; ?></td>
          <td><?php echo $status; ?></td>
          <td><?php echo $row["doc"]; ?></td>
          <td><?php echo get_user_name($connect, $row["user_id"]); ?></td>
           
           
              
     </tr>
      
 <?php     
}
?>
</table> 
<?php 
}
}
?>

   