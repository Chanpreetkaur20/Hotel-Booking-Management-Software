<?php
//hotel.php

// include('database_connection.php');
include('function.php');


if(!isset($_SESSION['typee1']))
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
		$('#sp_dob').datepicker({
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
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title">Hotel List</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="row" align="right">
                             <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#hotelModal" class="btn btn-success btn-xs">Add</button>   		
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="hotel_data" class="table table-bordered table-striped">
                    			<thead><tr>
									<th>ID</th>
									<th>Hotel Name</th>
									<th>Location</th>
									<th>Sale Person</th>
									<th>Mobile No</th>
									<th>GST No</th>
									<th>Email Id</th>
									<th>Sale Person's DOB</th>
									<th>Status</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr></thead>
                    		</table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="hotelModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="hotel_form" autocomplete="off">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Hotel</h4>
    				</div>
    				<div class="modal-body">
    					<label>Enter Hotel Name</label>
						<input type="text" name="hname" id="hname" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter Location</label>
						<input type="text" name="location" id="location" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter Sale's Person Name</label>
						<input type="text" name="sperson" id="sperson" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter Mobile Number</label>
						<input type="text" name="mob" id="mob" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter GST Number</label>
						<input type="text" name="gst_no" id="gst_no" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter Email</label>
						<input type="text" name="mail" id="mail" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter Sale's Person DOB</label>
						<input type="text" name="sp_dob" id="sp_dob" class="form-control"  />
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="hotel_id" id="hotel_id"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
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
		$('#hotel_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Hotel");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#hotel_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"hotel_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#hotel_form')[0].reset();
				$('#hotelModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				hoteldataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var hotel_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"hotel_action.php",
			method:"POST",
			data:{hotel_id:hotel_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#hotelModal').modal('show');
				$('#hname').val(data.hname);
				$('#location').val(data.location);
				$('#sperson').val(data.sperson);
				$('#mob').val(data.mob);
				$('#gst_no').val(data.gst_no);
				$('#mail').val(data.mail);
				$('#sp_dob').val(data.sp_dob);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Hotel Details");
				$('#hotel_id').val(hotel_id);
				$('#action').val('Edit');
				$('#btn_action').val("Edit");
			}
		})
	});

	var hoteldataTable = $('#hotel_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"hotel_fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[3, 4],
				"orderable":false,
			},
		],
		"pageLength": 25
	});
	$(document).on('click', '.delete', function(){
		var hotel_id = $(this).attr('id');
		var status = $(this).data("status");
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"hotel_action.php",
				method:"POST",
				data:{hotel_id:hotel_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					hoteldataTable.ajax.reload();
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


				