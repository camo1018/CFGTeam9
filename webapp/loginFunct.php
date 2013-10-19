<?php
	include 'core/init.php';

	if(empty($_POST)===false){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username)===true || empty($password)===true){
			$errors[] = 'You need to enter a username and password';
			//echo $errors;

		}else if(user_exists($username)===false){
			$errors[] = "We can\'t find that username. Have you registered?";
			//echo $errors;
		}else {
			
		$login = login($username, $password);

			if($login === false){
				$errors[] = 'The username and password do not match';
				//echo $errors;
				echo 'Not working';
			}else{
				
				$_SESSION['user_id'] = $login;
				$_SESSION['access_code'] = 'a';
				$_SESSION['name_name'] = 'b';
				
			
				header('Location: JawLogin.php');
				exit();
			}
		}

		header('Location: loginerror.php');
		
	}
	
?>