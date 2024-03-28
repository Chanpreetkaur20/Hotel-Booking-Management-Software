<?php
//agent.php

// include('database_connection.php');
include('function.php');


if(!isset($_SESSION['typee1']))
{
	header('location:login.php');
}



include('header.php');

?>
 
	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title">Agent List</h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="row" align="right">
                             <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#agentModal" class="btn btn-success btn-xs">Add</button>   		
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-sm-12 table-responsive">
                    		<table id="agent_data" class="table table-bordered table-striped">
                    			<thead><tr>
									<th>ID</th>
									<th>Agent Name</th>
									<th>Phone</th>
									<th>Address</th>
                                    <th>City</th>
                                    <th>Email</th>
                                    <th>Gst No.</th>
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
    <div id="agentModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="agent_form" autocomplete="off">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Agent</h4>
    				</div>
    				<div class="modal-body">
    					<label>Enter Agent Name</label>
						<input type="text" name="agent_name" id="agent_name" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter Phone no.</label>
						<input type="text" name="phone" id="phone" class="form-control" required />
    				</div>
                    <div class="modal-body">
    					<label>Enter Address</label>
						<input type="text" name="address" id="address" class="form-control" required />
    				</div>
                    <div class="modal-body">
    					<label>Enter City</label>
						<input type="text" name="city" id="city" class="form-control" required />
    				</div>
                    <div class="modal-body">
    					<label>Enter Email</label>
						<input type="text" name="email" id="email" class="form-control" required />
    				</div>
					<div class="modal-body">
    					<label>Enter GST</label>
						<input type="text" name="gst" id="gst" class="form-control"  />
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="agent_id" id="agent_id"/>
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
		$('#agent_form')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Agent");
		$('#action').val('Add');
		$('#btn_action').val('Add');
	});

	$(document).on('submit','#agent_form', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var form_data = $(this).serialize();
		$.ajax({
			url:"agent_action.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
				$('#agent_form')[0].reset();
				$('#agentModal').modal('hide');
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				agentdataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.update', function(){
		var agent_id = $(this).attr("id");
		var btn_action = 'fetch_single';
		$.ajax({
			url:"agent_action.php",
			method:"POST",
			data:{agent_id:agent_id, btn_action:btn_action},
			dataType:"json",
			success:function(data)
			{
				$('#agentModal').modal('show');
				$('#agent_name').val(data.agent_name);
				$('#phone').val(data.phone);
                $('#address').val(data.address);
                $('#city').val(data.city);
                $('#email').val(data.email);
                $('#gst').val(data.gst);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Agent Details");
				$('#agent_id').val(agent_id);
				$('#action').val('Edit');
				$('#btn_action').val("Edit");
			}
		})
	});

	var agentdataTable = $('#agent_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"agent_fetch.php",
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
		var agent_id = $(this).attr('id');
		var status = $(this).data("status");
		var btn_action = 'delete';
		if(confirm("Are you sure you want to change status?"))
		{
			$.ajax({
				url:"agent_action.php",
				method:"POST",
				data:{agent_id:agent_id, status:status, btn_action:btn_action},
				success:function(data)
				{
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					agentdataTable.ajax.reload();
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


				