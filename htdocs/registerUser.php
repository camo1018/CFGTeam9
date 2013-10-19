<?php
	include 'core/init.php';
	if(empty($_POST)===false && empty($errors)===true){
		$register_data = array( 'username' => $_POST['username'],
					'password' => $_POST['password'],
					'first_name' => $_POST['first_name'],
					'last_name' => $_POST['last_name'],
					'email' => $_POST['email']
					);
		register_user($register_data);
		header('Location: login.php');
		exit();
	}
	else if(empty($errors)===false){
		echo output_errors($errors);
	}
?>
