<?php
	include 'core/init.php'
?>

<!DOCTYPE html>
<html>
<head><link href ="css/global/bootstrap/bootstrap.min.css" rel="stylesheet" media = "screen">
<link href="css/global/styles.css" rel="stylesheet">
<link href="css/login/login.css" rel="stylesheet">
</head>	
<body>
<div id= "backimg">
<div id="signin-container">
<h1>Login</h1>
	<form id="login_form" name ="login_form" action = 'loginFunct.php' class= "form-signin" method='post'accept-charset='UTF-8'>
			<fieldset>
				<input type='text' class= "form-control"  placeholder= "username" name='username' id='username'  maxlength="50" />
				
				<input type='password' class= "form-control" placeholder= "password" name='password' id='password' maxlength="50" />
				 
				<input type='submit' id="submit-button" class= "btn btn-primary" name='Submit' value='Submit' />
				<input type="checkbox" name="keeplog" value="keeplog">Keep Logged In?
			</fieldset>
	</form>
	</div>
	<script src="js/global/bootstrap/jquery.js"></script>
    <script src="js/global/bootstrap/bootstrap.min.js"></script>
 </div> 
</body>
</html>
