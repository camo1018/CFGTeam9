<?php
    //this function will register a user
    function register_user($register_data){
        array_walk($register_data, 'array_sanitize');
        //encrypt the password
        $register_data['password'] = md5($register_data['password']);    
        $fields = '`'. implode('`, `', array_keys($register_data)) . '`';
        $data = '\''.implode('\', \'', $register_data) . '\'';
        //create the sql query
        mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");   
    }
    //determine if user is logged in or not
    function logged_in(){
        return (isset($_SESSION['user_id'])) ? true: false;    
    }
    //check if this user exists
   function user_exists($username){
       $username = sanitize($username);
       $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
        return (mysql_result($query, 0)==1) ? true : false;
   }
   //check if email exists
    function email_exists($email){
       $email = sanitize($email);
       $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
        return (mysql_result($query, 0)==1) ? true : false;
   }
   //retrieve the id based on username
   function user_id_from_username($username){
        $username = sanitize($username);
        return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, 'user_id');
   }
   //method to login
   function login($username, $password){
        $user_id = user_id_from_username($username);
        //make it so username prevents sql injection
        $username = sanitize($username);
        //encrypt 
        $password = md5($password);
        $query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'");
        return (mysql_result($query, 0)==1) ? $user_id : false;
   }

   //get user's first name
   function first_name(){
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT `first_name` FROM `users` WHERE `user_id` = '$user_id'");
	return mysql_result($query, 0, 'first_name');
   }

   function last_name(){
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT `last_name` FROM `users` WHERE `user_id` = '$user_id'");
	return mysql_result($query, 0, 'last_name');
   }

   function first_name_from_user_id($user_id){
	$query = mysql_query("SELECT `first_name` FROM `users` where `user_id` = '$user_id'");
	return mysql_result($query, 0, 'first_name');
   }

   function last_name_from_user_id($user_id){
	$query = mysql_query("SELECT `last_name` FROM `users` where `user_id` = '$user_id'");
	return mysql_result($query, 0, 'last_name');
   }

   function total_calories_burned(){
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT `calories` FROM `calorie_total` WHERE `user_id` = '$user_id'");
	return mysql_result($query, 0, 'calories');
   }

   //gets current session user's monthly calories burned.
   //parameters - M for moves only, W for workouts only, B for both
   function monthly_calories_burned($type){
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT `calories` FROM `calorie_month` WHERE `user_id` = '$user_id' and `type` = '$type'");
	if ($type == "B") {
		$query = mysql_query("SELECT `calories` FROM `calorie_month` WHERE `user_id` = '$user_id'");
	}
	return mysql_result($query, 0, 'calories');
   }
   function packets_Donated(){
  $user_id = $_SESSION['user_id'];
  $query = mysql_query("SELECT `calories` FROM `calorie_total` WHERE `user_id` = '$user_id'");
  return mysql_result($query, 0, 'calories')/500;
   }  

   function lives_saved(){
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT `calories` FROM `calorie_total` WHERE `user_id` = '$user_id'");
	return mysql_result($query, 0, 'calories')/(500 * 15);
   }   

  function recent($type){
  $user_id = $_SESSION['user_id'];
  $result = mysql_query("SELECT * FROM `calorie_count` WHERE `type` = '$type' AND `user_id` = '$user_id' ORDER BY `date` DESC LIMIT 3");
  if (!$result) {
      echo 'Could not run query: ' . mysql_error();
      exit;
  }
  $items_array = $result;
  for($k=0;$k<count($items_array);$k++)
  {
  $row = mysql_fetch_row($result);
  echo '    Calories Burned:  ';
  echo $row[3]; 
  echo '    Date:  ';
  echo $row[4];
  }
}
 
   function sync($user_id, $type, $calories, $date){
    //mysql_query("REPLACE INTO 'calorie_count` SET 'user_id' = '$user_id', 'type' = '$type', 'calories' = '$calories', 'date' = '$date' ");
    $query = mysql_query("SELECT * FROM `calorie_count` WHERE `user_id` = '$user_id' AND `date` = '$date' AND `type` = '$type'");
    $result = mysql_fetch_assoc($query);
    $num = mysql_num_rows($query);
    if($num) {
    } else {
    mysql_query("INSERT INTO `calorie_count` (`user_id`, `type`, `calories`, `date`) VALUES ('$user_id', '$type', '$calories', '$date')");
    }
   }
?>
