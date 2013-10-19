<?php
	include 'core/init.php';
?>

<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/global/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/global/styles.css" rel="stylesheet">
</head>

<body>
	<div class="navbar navbar-inverse navbar-static-top">
  		<div class="container">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle"
  					data-toggle="collapse" data-target=".navbar-collapse">
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</button>
  				<a class="navbar-brand important-text" href="index.php">manaFit</a>
  			</div>
  			<div class="navbar-collapse collapse">
  				<ul class="nav navbar-nav ">
  					<li><a href="index.php">Home</a></li>
  					<li><a href="competition.php">Competition</a></li>
  					<li class="active"><a href="profile.php">Profile</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="support.php">Support</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="container" style="margin-left:10%; margin-right:10%;">
		<div class="row home-dynamic-container">
			<div class="col-md-4">
				<img src="assets/img/profilePhoto.gif" height="200px" weight="200px"/>
			</div>
			<div class="col-med-8">
				<h1>Name: <?php echo first_name(); ?> <?php echo last_name(); ?></h1>
				<p>Total Calories Burned: <?php echo total_calories_burned(); ?></p>
				<p>Total Meals Donated: <?php echo packets_Donated(); ?></p>
				<p class="important-text">Total Lives Saved: <?php echo lives_saved(); ?></p>
				<p class="important-text">Recent Workout Activity: <?php echo recent('W'); ?></p>
				<p class="important-text">Recent Cardio Activity: <?php echo recent('M'); ?></p>
			</div>
		</div>
		<div class="row home-dynamic-container">
			<h3>Awards</h3>
			<div class="row">
				<div class="col-md-03">
					<img src="assets/img/trophy.png"/>
					<p>Sample Award</p>
				</div>
			</div>
		</div>
	</div>
	
	
	<script src="js/global/bootstrap/jquery.js"></script>
    <script src="js/global/bootstrap/bootstrap.min.js"></script>
</body>

</html>
