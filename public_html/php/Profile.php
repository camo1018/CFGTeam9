<?php
  //start session and have ability to use functions defined
  include 'core/init.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mana Fitness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
	  <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               	<span class="icon-bar"></span>
	        <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
	    <a class="navbar-brand" href="Home.php">Mana Fitness</a>
	  </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="Home.php">Home</a></li>
 	      <li class="active"><a href="Profile.php">Profile</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
	<h1>Profile Page</h1>
	<h4>Name:  <?php echo first_name(); ?> <?php echo last_name(); ?></h4>
	<h4>Total Calories Burned:  <?php echo total_calories_burned(); ?></h4>
	<h4>Calories Burned For A Month:  <?php echo monthly_calories_burned("B"); ?></h4>
    </div>

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
