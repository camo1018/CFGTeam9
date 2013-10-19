<!DOCTYPE html>
<html>
<head><link href ="css/global/bootstrap/bootstrap.min.css" rel="stylesheet" media = "screen">
<link href="css/global/styles.css" rel="stylesheet">
<link href="css/register/register.css" rel="stylesheet">
</head>
<body>
<div id="register-container">
<h1>Register</h1>
	<form id="register_form" name ="register_form" action = 'registerUser.php' class= "form-register" method='post'accept-charset='UTF-8'>
			<fieldset>
				<input type='text' class= "form-control"  placeholder= "username" name='username' id='username'  maxlength="50" />
				
				<input type='password' class= "form-control" placeholder= "password" name='password' id='password' maxlength="50" />
				<input type='text' class= "form-control" placeholder= "first name" name='first_name' id='first_name' maxlength="50" />
				<input type='text' class= "form-control" placeholder= "last name" name='last_name' id='last_name' maxlength="50" />
				<input type='text' class= "form-control" placeholder= "email" name='email' id='email' maxlength="100" />				 
				<input type='submit' id="submit-button" class= "btn btn-primary" name='Submit' value='Submit' />
			</fieldset>
	</form>
	</div>
		<script src="js/global/bootstrap/jquery.js"></script>
    <script src="js/global/bootstrap/bootstrap.min.js"></script>
  
</body>
</html>
