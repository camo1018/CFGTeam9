<!--Register users-->
<?php
  //include necessities
  include 'core/init.php';
  //create an array that contains all values needed
  if(empty($_POST)===false){
     $required_fields = array('username', 'password', 'password_again', 'first_name' ,'email');
	//for each value in teh array check to see if it is filled
        foreach($_POST as $key=>$value){
          if(empty($value) && in_array($key, $required_fields)===true){
		$errors[] = 'Fields marked with an asterisk are required';
		break 1;
	      }
	    }
	  //check to see if the username is available
          if(empty($errors) === true){
	      if(user_exists($_POST['username']) === true) {
		  $errors[] = 'Sorry, the user \''. $_POST['username'] . '\' is already taken.';
		}
	  //check to see if the password is at least 6 characters
	      if(strlen($_POST['password']) < 6){
		  $errors[] = 'Your password must be at least 6 characters';
	      }
	  //check to see if both passwords match
	      if($_POST['password'] !== $_POST['password_again']){
		$errors[] = 'Your passwords do not match';
	      }
	  //check to see if valid email is given
	      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)=== false){
		$errors[] = 'A valid email address is required';
	      }
	  //check to see if email is available
	      if(email_exists($_POST['email'])===true){
		$errors[] = 'Sorry, the email \''. $_POST['email'] . '\' is already in use';
	      }
	    }
	    
	  }
 ?>
<!DOCTYPE html>
  <html lang="en">
    <!--Information of the html page-->
<head>
    <meta charset="utf-8">
    <title>Mana Fitness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
    </script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand">Mana Fitness</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              	<li><a href="Home.php"> Home </a></li>
              	<li class="active"><a href="Register.php"> Register </a></li>
  				<li><a href="Login.php"> Login </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <h1>Mana Fitness Web Page</h1>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
      <!--First attempt at using fluid grid system-->
        <div class="span1">
      <!--Leave space for sidebar content-->
        </div>
      <div class="span11">
      <!--Descriptions or subheader space-->
      <br>
      <div class="media">
        <a class="pull-left">
          <img id="temp" src="temp.jpg" class="img-circle" alt="">
        </a>
        <div class="media-body">
          <h4 class="media-heading"> Welcome! </h4>
            <br>
            <p> This is the temporary site we're using to build out Mana Fitness!</p>
            <br>

            <p>Here you can register for the site:<p>
              <div class="row-fluid">
                <div class="span5">
                </div>
                <div class="span5">
                </div>
              </div>
              <br>
              <div class="row-fluid">
                <div class="span10">
			      <?php
			      if(empty($_POST)===false && empty($errors)===true){
			    	///register user, imput all values into an array
				$register_data = array(
					  'username' => $_POST['username'],
					  'password' => $_POST['password'],
					  'first_name' => $_POST['first_name'],
					  'last_name' => $_POST['last_name'],
					  'email' => $_POST['email']
					  );
				//register the user
				register_user($register_data);
				//output results
				echo 'Registration was successful! Log in now to enjoy more features';
				    exit();
				      }
			      else if(empty($errors)===false){
				//output errors
			    	echo output_errors($errors);
					
				      }
				    ?>
		   
		<!--the registration form   -->
		   <form action="" method="post">
			Username*: <input type="text" name="username"> <br>
			Password*: <input type="password" name="password"> <br>
			Password again*: <input type="password" name="password_again"> <br>
			First Name*: <input type="text" name="first_name"> <br>
			Last Name: <input type="text" name="last_name"> <br>
			Email*: <input type="text" name="email"> <br>
			<input type="submit" value="Register"> <br>
		    </form>
 			</div>
   		   </div>
        </div>
      </div>
        </div>
      </div>
    </div>

  </body>
</html>