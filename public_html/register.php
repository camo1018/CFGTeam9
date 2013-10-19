<!DOCTYPE html>
<html>
<head><link href ="css/global/bootstrap/bootstrap.min.css" rel="stylesheet" media = "screen">
<link href="css/global/styles.css" rel="stylesheet">
<link href="css/register/register.css" rel="stylesheet">
</head>
<body>
<h1>Register</h1>
<div id="register-container">

	<form id="register_form" name ="register_form" action = 'register.php' class= "form-register" method='post'accept-charset='UTF-8'>
			<fieldset>
				<input type='text' class= "form-control"  placeholder= "username" name='username' id='username'  maxlength="50" />
				
				<input type='password' class= "form-control" placeholder= "password" name='password' id='password' maxlength="50" />
				 
				<input type='submit' id="submit-button" class= "btn btn-primary" name='Submit' value='Submit' />
			</fieldset>
	</form>
	</div>
		<script src="js/global/bootstrap/jquery.js"></script>
    <script src="js/global/bootstrap/bootstrap.min.js"></script>
  
</body>
</html>
