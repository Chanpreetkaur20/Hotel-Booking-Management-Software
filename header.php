<?php
//header.php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">CMS</h2>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						
					</div>
					<ul class="nav navbar-nav">
					    <li><a href="index.php">Home</a></li>
					<?php
					if($_SESSION['typee1'] == 'master')
					{
					?>
						<!-- <li><a href="index.php" class="navbar-brand">Home</a></li> -->
						<li><a href="user.php">Manage Users</a></li>
					 	<!-- <li><a href="Hotel.php">Hotel Details</a></li> -->
						<!--<li><a href="brand.php">Brand</a></li>
						<li><a href="product.php">Booking Details</a></li>  -->
					<?php
					}
					?>
						<li><a href="booking.php">Manage Bookings</a></li>
						<li><a href="prep.php">Pre Purchase</a></li>
						<li><a href="fest.php">Festival Blockings</a></li>
						<li><a href="sub_s.php">Search Booking</a></li>
						<li><a href="allf.php">All Festival Blockings</a></li>
						<li><a href="allp.php">Pre Blockings</a></li>
						<li><a href="hotel.php">Hotel Details</a></li>
						<li><a href="agent.php">Agent Details</a></li>
						<li><a href="source.php">Source Details</a></li>

						
						<!-- <li><a href="category.php">test</a></li> -->
						<?php
					if($_SESSION['typee1'] == 'master')
					{
					?>
						<!-- <li><a href="user.php">Manage Users</a></li> -->
					 	<li><a href="report.php">Report</a></li> 
					<?php
					}
					?>	
					</ul> 
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo $_SESSION["user_name"]; ?></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php">Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>

				</div>
			</nav>
			