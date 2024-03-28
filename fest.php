<?php
//fest.php

// include('database_connection.php');
include('function.php');
if(!isset($_SESSION["typee1"]))
{
	header('location:login.php');
}
 


include('header.php');
?>
<link rel="stylesheet" href="css/datepicker.css">
	<script src="js/bootstrap-datepicker1.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

	<script>
	$(document).ready(function(){
		$('#chk_in').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
		$('#chk_out').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
        $('#lst_dt').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
		$('#chkin').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
		$('#chkout').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
	});
	</script>
		<span id="alert_action"></span>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading">
                    	<div class="row">
                        	<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="panel-title">Festival Booking</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            	<button type="button" name="add" id="add_button" data-toggle="modal" data-target="#festModal" class="btn btn-success btn-xs">Add</button>
                        	</div>
                        </div>
                       
                        <div class="clear:both"></div>
                   	</div>
                   	<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="fest_data" class="table table-bordered table-striped">
                   				<thead>
									<tr>
                                    <th>ID</th>
                                    <th>Festival</th>
	    							<th>Hotel Name</th>
	    							
	    							<th>Check IN</th>
	    							<th>Check OUT</th>
	    							<th>No Of Rooms</th>
	    							<th>Extra Bed</th>
	    							<th>Meal Plan</th>
	    							<th>Purchase Amount</th>
	    							<th>Last Date</th>
                                    <th>Days Left</th>
	    							<th>Status</th>
	    							<th>Booking Date</th>
	    							<th>Edit</th>
									<th>Add to Booking</th>
	    							<th>Delete</th>
							    	<?php
							    	if($_SESSION['type'] == 'master')
							    	{
							    		echo '<th>Created By</th>';
							    	}
							    	?>
									</tr>
								</thead>
                   			</table>
                   		</div>
                   	</div>
               	</div>
           	</div>
        </div>
		<div id="bookingModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="booking_form" autocomplete="off">
        			<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add To Bookings</h4>
        			</div>
        			<div class="modal-body">
                    <div class="form-group">
					<label>Enter Hotel Name</label>
							<select name="hotel_n" id="hotel_n" class="form-control" required>
                                    <option value="">Select Hotel</option>
                                    <?php echo fill_hotel_list($connect);?>
                            </select>
                        </div>
						<div class="form-group">
                            <label>Enter Agent Name</label>
                            <select name="agent" id="agent" class="form-control" required>
                                    <option value="">Select Agent</option>
                                    <?php echo fill_agent_list($connect);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter Customer Name</label>
                            <input type="text" name="guest_n" id="guest_n" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Check-In</label>
                            <input type="text" name="chkin" id="chkin" class="form-control" required />
                        </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Check-Out</label>
                            <input type="text" name="chkout" id="chkout" class="form-control" required />
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Number Of Rooms</label>
                            <input type="text" name="room" id="room" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Extra Bed</label>
                            <input type="text" name="bedd" id="bedd" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Meal Plan</label>
                            <input type="text" name="meals" id="meals" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Purchase Price</label>
                            <input type="text" name="prat" id="prat" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Sale Price</label>
                            <input type="text" name="srat" id="srat" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>GST %</label>
                            <input type="text" name="gstt" id="gstt" class="form-control" required />
                        </div>
        			</div>
        			<div class="modal-footer">
					<input type="hidden" name="fest_id" id="fest_id1" />
        				<input type="hidden" name="btn_action" id="btn_action1" />
        				<input type="submit" name="action1" id="action1" class="btn btn-info" value="get" />
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
        		</form>

        	</div>
        </div>
        <div id="festModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="fest_form" autocomplete="off">
        			<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Festival Booking</h4>
        			</div>
        			<div class="modal-body">
                    <div class="form-group">
                            <label>Enter Festival</label>
                            <input type="text" name="fest" id="fest" class="form-control" required />
                        </div>
                    <div class="form-group">
                            <label>Enter Hotel Name</label>
                            <select name="hotel_name" id="hotel_name" class="form-control" required>
                                    <option value="">Select Hotel</option>
                                    <?php echo fill_hotel_list($connect);?>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Check-In</label>
                            <input type="text" name="chk_in" id="chk_in" class="form-control" required />
                        </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Check-Out</label>
                            <input type="text" name="chk_out" id="chk_out" class="form-control" required />
                        </div>
                        </div>

                        <div class="form-group">
                            <label>Number Of Rooms</label>
                            <input type="text" name="rooms" id="rooms" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Extra Bed</label>
                            <input type="text" name="bed" id="bed" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Meal Plan</label>
                            <input type="text" name="meal" id="meal" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Purchase Price</label>
                            <input type="text" name="prate" id="prate" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Last Date</label>
                            <input type="text" name="lst_dt" id="lst_dt" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>GST %</label>
                            <input type="text" name="gst" id="gst" class="form-control" required />
                        </div>
        			</div>
        			<div class="modal-footer">
						<input type="hidden" name="fest_id" id="fest_id" />
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
        		</form>

        	</div>
        </div>
<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#fest_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Festival Booking");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	var festdataTable = $('#fest_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"fest_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"target":[4,5],
				"orderable":false
			}
		],
		"pageLength": 25
	});

	$(document).on('submit', '#fest_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"fest_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#fest_form')[0].reset();
				$('#festModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				festdataTable.ajax.reload();
			}
		})
	});

	$(document).on('submit', '#booking_form', function(event){
		event.preventDefault();
		$('#action1').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"fest_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#booking_form')[0].reset();
				$('#bookingModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action1').attr('disabled', false);
				// festdataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var fest_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"fest_action.php",
			method:"POST",
			data:{fest_id:fest_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#festModal').modal('show');
                $('#fest').val(data.fest);
				$('#hotel_name').val(data.hotel_name);
			
				$('#chk_in').val(data.chk_in);
				$('#chk_out').val(data.chk_out);
				$('#rooms').val(data.rooms);
				$('#bed').val(data.bed);
				$('#meal').val(data.meal);
				$('#prate').val(data.prate);
				$('#lst_dt').val(data.lst_dt);
				$('#gst').val(data.gst);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Festival Booking");
				$('#fest_id').val(fest_id);

				$('#action').val('Edit');
				$('#btn_action').val('Edit');
				
			}
		})
	});

	$(document).on('click', '.book', function(){
		var fest_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"fest_action.php",
			method:"POST",
			data:{fest_id:fest_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#bookingModal').modal('show');
                // $('#fest').val(data.fest);
				$('#hotel_n').val(data.hotel_name);
			
				$('#chkin').val(data.chk_in);
				$('#chkout').val(data.chk_out);
				$('#room').val(data.rooms);
				$('#bedd').val(data.bed);
				$('#meals').val(data.meal);
				$('#prat').val(data.prate);
				// $('#lst_dt').val(data.lst_dt);
				$('#gstt').val(data.gst);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i>Add To Booking");
				$('#fest_id1').val(fest_id);

				$('#action1').val('Insert');
				$('#btn_action1').val('Insert');
				
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var fest_id = $(this).attr("id");
		var status = $(this).data('status');
		var btn_action = "delete";
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"fest_action.php",
				method:"POST",
				data:{fest_id:fest_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					festdataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
	});

	

});
</script>

<?php
include('footer.php');
?>