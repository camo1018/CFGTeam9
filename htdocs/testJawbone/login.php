<!DOCTYPE html>
<html>
<head>
  <link href ="css/bootstrap.min.css" rel=stylesheet" media = "screen">
  <link href="css/global/styles.css" rel="stylesheet">
  <link href="css/login/login.css" rel="stylesheet">
</head>
<body>
  <div id="fb-root"></div>
	<form id="login_form" action = 'login.php' method='post'accept-charset='UTF-8'>
			<fieldset>
				<input type='text' placeholder= "username" name='username' id='username'  maxlength="50" />
				
				<input type='password' placeholder= "password" name='password' id='password' maxlength="50" />
				 
				<input type='submit' name='Submit' value='Submit' />
			</fieldset>
	</form>
  <button id="fb-login">Login to Facebook</button>
  
  <form action="https://jawbone.com/auth/oauth2/auth" method="get">
    <input type="hidden" name="response_type" value="code" /> 
    <input type="hidden" name="client_id" value="KsqTospR0zw" /> 
    <input type="hidden" name="redirect_uri" value="http://www.google.com"/> 
    <input type="hidden" name="scope" value="move_read workout_read"/>
    <input type="submit"> 
  </form>
    
  <!--<form action="https://jawbone.com/auth/oauth2/auth" method="get"> 
    <input type="hidden" name="response_type" value="code" /> 
    <input type="hidden" name="client_id" value="KsqTospR0zw" /> //Our Client ID goes here
    <input type="hidden" name="redirect_uri" value="http://localhost:8080/codeForGood/login.php"/> 	//Redirect to our main page
    <input type="hidden" name="scope" value="move_read workout_read"/>
    <input type="submit" value="Login to Jawbone"> 
  </form>
</body>
  <script type="text/javascript" src="js/login/fb.js"></script>-->
</html>
