<?php
//booking.php

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
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="css/fonts.css"> -->
    <!-- <script src="js/jquery.js"></script> -->
    <!-- <script src="js/bootstrap.js"></script> -->
    <!-- <script src="js/myjs.js"></script> -->
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
		$('#dor').datepicker({
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
                            	<h3 class="panel-title">Booking Details</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            	<button type="button" name="add" id="add_button" data-toggle="modal" data-target="#bookingModal" class="btn btn-success btn-xs">Add</button>
                        	</div>
                        </div>
                       
                        <div class="clear:both"></div>
                   	</div>
                   	<div class="panel-body">
                   		<div class="row"><div class="col-sm-12 table-responsive">
                   			<table id="booking_data" class="table table-bordered table-striped" >
                   				<thead>
									<tr>
                                    <th>Booking ID</th>
									<th>Agent Name</th>
									<th>Hotel Name</th>
									<th>Source Name</th>
	    							<th>Customer Name</th>
	    							<th>Check IN</th>
	    							<th>Check OUT</th>
	    							<th>No Of Rooms</th>
	    							<th>Extra Bed</th>
	    							<th>Extra Child</th>
	    							<th>Meal Plan</th>
	    							<th>Purchase Amount</th>
	    							<th>sale Amount</th>
                                    
	    							<th>Total Profit</th>
	    							<th>Order Status</th>
	    							<th>Booking Date</th>
	    							<th>Edit</th>
									<th>Payment Details</th>
	    							<th>Delete</th>
									
									<th>Add More</th>
									<!-- <th>extra</th> -->
							    	<?php
							    	if($_SESSION['typee1'] == 'master')
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






		<div id="paymentModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="payment_form" autocomplete="off" >
        			<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Payment Details</h4>
        			</div>
        			<div class="modal-body">
                        <div class="form-group">
                            <label>Cash Received</label>
                            <input type="text" name="cash" id="cash" class="form-control"  />
                        </div>

                        <div class="form-group">
                            <label>Received in Bank</label>
                            <input type="text" name="bank" id="bank" class="form-control"  />
                        </div>

                        <div class="form-group">
                            <label>Received at Hotel</label>
                            <input type="text" name="hotel" id="hotel" class="form-control"  />
                        </div>

                        <div class="form-group">
                            <label>Received By</label>
                            <input type="text" name="received_by" id="received_by" class="form-control"  />
                        </div>

                        <div class="form-group">
                            <label>Date of Receiving</label>
                            <input type="text" name="dor" id="dor" class="form-control"  />
                        </div>
        			</div>
        			<div class="modal-footer">
                        <input type="hidden" name="pay_id" id="pay_id" />
						<input type="hidden" name="booking_id" id="booking_id1" />
        				<input type="hidden" name="btn_action" id="btn_action1" />
        				<input type="submit" name="action1" id="action1" class="btn btn-info" value="get" />
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
					<div id="other_records"></div>
					

        		</div>
        		</form>

        	</div>
        </div>
        <div id="bookingModal" class="modal fade">
        	<div class="modal-dialog">
        		<form method="post" id="booking_form" autocomplete="off">
        			<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Bookings</h4>
        			</div>
        			<div class="modal-body">
                    <div class="form-group">
					<label>Enter Hotel Name</label>
							<select name="hotel_name" id="hotel_name" class="form-control" required>
                                    <option value="">Select Hotel</option>
                                    <?php echo fill_hotel_list($connect);?>
                            </select>
                        </div>
                        <div class="form-group">
					<label>Enter Source Name</label>
							<select name="source_name" id="source_name" class="form-control" required>
                                    <option value="">Select Source</option>
                                    <?php echo fill_source_list($connect);?>
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
                            <input type="text" name="guest_name" id="guest_name" class="form-control" required />
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
                            <label>Extra Child</label>
                            <input type="text" name="child" id="child" class="form-control" required />
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
                            <label>Sale Price</label>
                            <input type="text" name="srate" id="srate" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>GST %</label>
                            <input type="text" name="gst" id="gst" class="form-control" required />
                        </div>
        			</div>
        			<div class="modal-footer">
						<input type="hidden" name="booking_id" id="booking_id" />
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
        		</div>
        		</form>

        	</div>
        </div>

		




    <!--Registration Modal-->
    <!-- <div class="modal fade" id="Registration">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Registration Form</h3>
          </div>
		  
          <div class="modal-body">
          <p id="message" class="text-dark"></p>
            <form>
              <input type="text" class="form-control my-2" placeholder="User Name" id="UserName">
              <input type="email" class="form-control my-2" placeholder="User Email" id="UserEmail">
            </form>
			
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_register">Register Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div> -->

    

    <!--Delete Modal-->
    <!--Update Modal-->
    <!-- <div class="modal" id="delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="text-dark">Delete Record</h3>
          </div>
          <div class="modal-body">
            <p> Do You Want to Delete the Record ?</p>
            <button type="button" class="btn btn-success" id="btn_delete_record">Delete Now</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div> -->
   
   

<script>
$(document).ready(function(){

	$('#add_button').click(function(){
		$('#booking_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Bookings");
		$('#action').val("Add");
		$('#btn_action').val("Add");
	});

	$(document).on('click', '.addm', function(){
		var booking_id = $(this).attr("id");
		var btn_action = 'addm';
		
		
				
				$('#bookingModal').modal('show');
				$('.modal-title').html("<i class='fa fa-plus'></i> Add Bookings");
				$('#action').val("addm");
				$('#btn_action').val("addm");
				$('#booking_id').val(booking_id);
				
			$.ajax({
			url:"booking_action.php",
			method:"POST",
			data:{booking_id:booking_id, btn_action:btn_action},
			dataType:"json"
		})		
			
		
	});

	var bookingdataTable = $('#booking_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"booking_fetch.php",
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

	$(document).on('submit', '#booking_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"booking_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#booking_form')[0].reset();
				$('#bookingModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				bookingdataTable.ajax.reload();
			}
		})
	});
	$(document).on('submit', '#payment_form', function(event){
		event.preventDefault();
		$('#action1').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"booking_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#payment_form')[0].reset();
				$('#paymentModal').modal('hide');
				$('#alert_action1').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action1').attr('disabled', false);
				bookingdataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var booking_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"booking_action.php",
			method:"POST",
			data:{booking_id:booking_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#bookingModal').modal('show');
				$('#hotel_name').val(data.hotel_name);
				$('#source_name').val(data.source_name);
				$('#agent').val(data.agent);
				$('#guest_name').val(data.guest_name);
				$('#chk_in').val(data.chk_in);
				$('#chk_out').val(data.chk_out);
				$('#rooms').val(data.rooms);
				$('#bed').val(data.bed);
				$('#child').val(data.child);
				$('#meal').val(data.meal);
				$('#prate').val(data.prate);
				$('#srate').val(data.srate);
				$('#gst').val(data.gst);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Booking");
				$('#booking_id').val(booking_id);

				$('#action').val('Edit');
				$('#btn_action').val('Edit');
				
			}
		})
	});

	



	$(document).on('click', '.payment', function(){
		var booking_id = $(this).attr("id");
		var pay_id = $(this).attr("id");
		var btn_action = 'fetch_single1';
		$.ajax({
			url:"booking_action.php",
			method:"POST",
			data:{booking_id:booking_id, pay_id:pay_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#paymentModal').modal('show');
				$('#cash').val(data.cash);
				$('#bank').val(data.bank);
				$('#hotel').val(data.hotel);
				$('#received_by').val(data.received_by);
				$('#dor').val(data.dor);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Payment Details");
				$('#booking_id1').val(booking_id);
				$('#pay_id').val(pay_id);

				$('#action1').val('ADD');
				$('#btn_action1').val('ADD');
				
			}
		})
	});

	$(document).on('click', '.payment', function(){
		var booking_id = $(this).attr("id");
		var pay_id = $(this).attr("id");
		var btn_action = 'fetch_single1';
		$.ajax({
			url:"view.php",
			method:"POST",
			data:{booking_id:booking_id, pay_id:pay_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#other_records').html(data.html);
				
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var booking_id = $(this).attr("id");
		var status = $(this).data('status');
		var btn_action = "delete";
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"booking_action.php",
				method:"POST",
				data:{booking_id:booking_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					bookingdataTable.ajax.reload();
				}
			})
		}
		else
		{
			return false;
		}
	});

	

});



    $(document).on('click','.btn_delete',function()
    {
        var Delete_ID = $(this).attr('data-id1');
        $('#delete').modal('show');

        $(document).on('click','.btn_delete_record',function()
        {
            $.ajax(
                {
                    url: 'delete.php',
                    method: 'post',
                    data:{Del_ID:Delete_ID},
                    success: function(data)
                    {
                        $('#delete-message').html(data).hide(5000);
                        // view_record();
                    }
                })
        })
    })

</script>

<?php
include('footer.php');
?>