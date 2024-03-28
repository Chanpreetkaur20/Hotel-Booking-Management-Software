<?php
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
		$('#type1').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
		$('#type2').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true
		});
		
	});
	</script>
<form id = 'report_type'  method = 'post'>
    <div>
<div class="form-group">
					<label>Select Report Type</label>
							<select name="r_type" id="r_type" class="form-control" required>
                            <option value="">Select Report Type</option>
                                            <option value="hotel">Hotel Wise</option>
                                            <option value="user">User Wise</option>
                                            <option value="agent">Agent Wise</option>
                                            <option value="month">Month Wise</option>
                            </select>
</div>
<div class="modal-footer">
        				<input type="hidden" name="btn_action" id="btn_action1" />
        				<input type="submit" name="action1" id="action1" class="btn btn-info" value="get" />
        			</div>
</div>
</form>

<?php
if(@$_POST['r_type'] == 'hotel'){?>


    <form id ='hotelform' method='post' action= 'new.php' autocomplete='off'>
        <div class="form-group">
					<label>Enter Hotel Name</label>
							<select name="type" id="type" class="form-control" required>
                                    <option value="">Select Hotel</option>
                                    <?php echo fill_hotel_list($connect);?>
                            </select>
                            <!-- <label>Enter Month details</label> -->
                            <lable>From</lable>
                            <input type="text" name="type1" id="type1" class="form-control"/>
                        
                        
                            <lable>To</lable>
                            <input type="text" name="type2" id="type2" class="form-control"/>  
        </div>
        <div class="modal-footer">
                        <input type="hidden" name="rtype" id="rtype" value="hotel_name"/>
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="go" />
        </div>
    </form>
    
<?php
}
?>
<?php
if(@$_POST['r_type'] == 'agent'){?>


    <form id ='hotelform' method='post' action= 'new.php' autocomplete='off'>
        <div class="form-group">
					<label>Enter Agent Name</label>
							<select name="type" id="type" class="form-control" required>
                                    <option value="">Select Agent</option>
                                    <?php echo fill_agent_list($connect);?>
                            </select>
                            <!-- <label>Enter Month details</label> -->
                            <lable>From</lable>
                            <input type="text" name="type1" id="type1" class="form-control"/>
                        
                        
                            <lable>To</lable>
                            <input type="text" name="type2" id="type2" class="form-control"/>  
        </div>
        <div class="modal-footer">
                        <input type="hidden" name="rtype" id="rtype" value="agent"/>
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="go" />
        </div>
    </form>

<?php
}
?>

<?php
if(@$_POST['r_type'] == 'user'){?>


    <form id ='hotelform' method='post' action= 'new.php' autocomplete='off'>
        <div class="form-group">
					<label>Enter User Name</label>
							<select name="type" id="type" class="form-control" required>
                                    <option value="">Select User</option>
                                    <?php echo fill_user_list($connect);?>
                            </select>

                    <!-- <label>Enter Month details</label> -->
                            <lable>From</lable>
                            <input type="text" name="type1" id="type1" class="form-control"/>
                        
                        
                            <lable>To</lable>
                            <input type="text" name="type2" id="type2" class="form-control"/>        
        </div>
        <div class="modal-footer">
                        <input type="hidden" name="rtype" id="rtype" value="user"/>
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="go" />

                        
        </div>
    </form>

<?php

}
?>

<?php
if(@$_POST['r_type'] == 'month'){?>


    <form id ='hotelform' method='post' action= 'new.php' autocomplete="off">
    <div class="col-md-6">
                        <div class="form-group">
                            <label>Enter Month details</label>
                            <lable>From</lable>
                            <input type="text" name="type1" id="type1" class="form-control" required />
                        
                        
                            <lable>To</lable>
                            <input type="text" name="type2" id="type2" class="form-control" required />
                        
                        
       
        
                        <input type="hidden" name="rtype" id="rtype" value="month"/>
        				<input type="hidden" name="btn_action" id="btn_action" />
        				<input type="submit" name="action" id="action" class="btn btn-info" value="go" />
        </div>
    </form>

<?php
}
?>


