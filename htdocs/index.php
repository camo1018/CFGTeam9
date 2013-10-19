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
  					<li class="active"><a href="#">Home</a></li>
  					<li><a href="competition.php">Competition</a></li>
  					<li><a href="profile.php">Profile</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="support.php">Support</a></li>
				</ul>
			
			<div class="pull-right" >
				<button class="btn btn-primary btn-large pull-right" style="margin-top:7px;background-color:#E4701E;border:none;<?php if (!isset($_SESSION['user_id'])) { echo ';display:none'; } ?>">
					<a href="logout.php" style="color:#ffffff;">
					Logout
					</a>
				</button>
				<h4 class="pull-right" style="color:#ffffff;martin-top:7px;margin-right:10px<?php if (!isset($_SESSION['user_id'])) { echo ';display:none'; } ?>"><?php echo first_name(); ?> <?php echo last_name(); ?></h5>
				<button class="btn btn-primary btn-large pull-right" style="margin-top:7px;margin-right:10px;background-color:#E4701E;border:none;<?php if (isset($_SESSION['user_id'])) { echo 'display:none'; } ?>">
					<a href="login.php" style="color:#ffffff;">
					Login
					</a>
				</button>
				<button class="btn btn-primary btn-large pull-right" style="margin-top:7px;background-color:#E4701E;border:none;<?php if (isset($_SESSION['user_id'])) { echo 'display:none'; } ?>">
					<a href="register.php" style="color:#ffffff;">
					Register
					</a>
				</button>
			</div>
			
			</div>
			
			
		</div>
	</div>
	
		
	
	<div class="container">
		<div style="max-width:640px;max-height:120px;margin:10px;margin-left:1%;">
			<img src="assets/img/manafitLogo.png" style="width:100%;">
		</div>
		
		<div class="row">
			<div class="col-md-8">
				<div class="">
					<div class="row home-dynamic-container">
						<h2>Leader Board</h2>
						<div class="table">
						</div>
					</div>

					<div class="row home-dynamic-container">
						<div style="margin-top:10px">
							<h2>Did you know ...? </h2>
							<ul>
								<li>Every 6 seconds a child dies of malnutrition.</li>
								<li>Malnutrition is 100% curable.</li>
								<li><span class="important-text">You can compete with your friends while saving starving children.</span></li>
							<ul>
							<br/>
								<a href="about.php" style="color:#E4701E;">Learn More >></a>
						</div>
					</div>
									
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="row">
					<button class="btn btn-primary btn-large pull-right" style="margin-right:32%;background-color:#E4701E;border:none;">
						<a href="http://mananutrition.org/donate" style="color:#ffffff;">
							End Hunger Now
						</a>
					</button>
					<hr class="featurette-divider"/>
				</div>
				<div class="row home-dynamic-container">
					<h3 class="important-text text-center">Compete for a cure.</h3>
					<p class="text-center">Compete with friends. Race to burn the most calories
					first.</p>
					<img class="center" src="assets/img/raceIcon.png"/>	
				</div>

				<div class="row home-dynamic-container">
					<h3 class="important-text text-center">Use your JawBone Device to find the cure.</h3>
					<p class="text-center">A no-hassle way to upload your calorie burning-progress.</p>
					<img style="margin-left:15%;margin-right:15%;" src="assets/img/jawboneIcon.png"/>	
				</div>
			</div>
			
		</div>
			
		
	</div>		
	</div>
	
	
	<script src="js/global/bootstrap/jquery.js"></script>
    <script src="js/global/bootstrap/bootstrap.min.js"></script>
</body>

</html>
