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
                            	<h3 class="panel-title">All Festival Booking</h3>
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
							    	<?php
							    		echo '<th>Created By</th>';
							    	
							    	?>
									</tr>
								</thead>
                   			</table>
                   		</div>
                   	</div>
               	</div>
           	</div>
        </div>
		
<script>
$(document).ready(function(){



	var festdataTable = $('#fest_data').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax":{
			url:"allf_fetch.php",
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

	
	

});
</script>

<?php
include('footer.php');
?>