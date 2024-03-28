<?php
//index.php
// include('database_connection.php');
include('function.php');

if(!isset($_SESSION["typee1"]))
{
	header("location:login.php");
}

include('header.php');

?>
	<br />
	<div class="row">
 	<?php
// 	if($_SESSION['typee1'] == 'master')
// 	{
// 	?>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Active User</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_user($connect); ?></h1>
			</div>
		</div>
	</div>


<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Active Agents</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_agent($connect); ?></h1>
			</div>
		</div>
	</div>
	
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Active Hotels</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_hotel($connect); ?></h1>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Active Sources</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_source($connect); ?></h1>
			</div>
		</div>
	</div>

<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Overall Profit</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo total_profit($connect); ?></h1>
			</div>
		</div>
	</div>
	
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Active Bookings</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_bookings($connect); ?></h1>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Active Pre Purchase</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_pp($connect); ?></h1>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Active Festival Blockings</strong></div>
			<div class="panel-body" align="center">
				<h1><?php echo count_total_fb($connect); ?></h1>
			</div>
		</div>
	</div>
	
	
	
<style>	
.special-header {
    color: black; /* Change this to the color you want */
}	
</style>
	
	<?php
	
	include('footer.php');
	?>
	<!--
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total Order Value</strong></div>
				<div class="panel-body" align="center">
					<h1>$<?php echo count_total_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total Cash Order Value</strong></div>
				<div class="panel-body" align="center">
					<h1>$<?php echo count_total_cash_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total Credit Order Value</strong></div>
				<div class="panel-body" align="center">
					<h1>$<?php echo count_total_credit_order_value($connect); ?></h1>
				</div>
			</div>
		</div>
		<hr />
		<?php
		if($_SESSION['typee1'] == 'master')
		{
		?>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Total Order Value User wise</strong></div>
				<div class="panel-body" align="center">
					<?php echo get_user_wise_total_order($connect); ?>
				</div>
			</div>
		</div>
		<?php
		}
		?>
	</div> -->
	
