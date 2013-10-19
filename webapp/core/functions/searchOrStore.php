<?php //getUsers


if (isset($_GET['query'])){
  $q = "SELECT name FROM users WHERE name LIKE '{$_GET['query']}'" ;
  echo $q;
  $r = mysql_query($q);
  
  while($row = mysql_fetch_array($r)) {
    $resultArr[] = $row;
  }

  if (isset($resultArr)) {
    foreach ($resultArr as $r) {
        print_r($resultArr);
    }
  }
  else{
      echo('Nothing to display.');
  }
}
if (isset($_POST['submitChallenge']) && isset($_POST['chalName']) && isset($_POST['chaldesc'])){
  $uid =  $_SESSION['user_id'];
  $name = $_POST['chalName'];
  $q0 = "SELECT user_id FROM users WHERE name='{$name}'";
  $r0 = mysql_query($q0);
  if (!r0){
    echo 'Sorry, could not find person. Please ask him or her to join!';
  }else{
    $gid = mysql_result($r0,0);
    echo "This is gid:"    . $gid;
    $description = $_POST['chaldesc'];
    $q = "INSERT INTO users_activity(userId, action, entity, description) VALUES({$uid}, 'c', {$gid}, '{$description}')" ;
    echo $q;
    echo $uid;
    $r = mysql_query($q);
    
    if (!$r){
      echo 'Uh oh, something went wrong.';
    }
  }
}


if (isset($_POST['submitGroup']) && isset($_POST['groupName']) && isset($_POST['groupDesc'])){
  $uid = $_SESSION['user_id'];
  $name = $_POST['groupName'];
  $q0 = "SELECT user_id FROM users WHERE name='{$name}'";
  $r0 = mysql_query($q0);
  if (!r0){
    echo 'Sorry, could not find person. Please ask him or her to join!';
  }else{
    $gid = mysql_result($r0,0);
    echo "This is gid:"    . $gid;
    $description = $_POST['groupDesc'];
    $q = "INSERT INTO Groups(group_name, description, num_followers, num_members, lives_saved, campaigns) VALUES('{$name}', '{$description}', 1, 1, 0, '')" ;
    echo $q;
    $r = mysql_query($q);
    
    if (!$r){
      echo 'Uh oh, something went wrong.';
    }
  }
}

if (isset($_POST['submitCampaign']) && isset($_POST['campName']) && isset($_POST['campDesc'])){
  $name = $_POST['campName'];
  $description = $_POST['campDesc'];
  $q = "INSERT INTO Campaigns(name, description, progress, goal, metric, num_followers, num_members, lives_saved) VALUES('{$name}', '{$description}', 0, {$_POST{campaignGoal}}, '{$campaignMetrics}', 1, 1, 0)" ;
  $r = mysql_query($q);
  
  if (!$r){
    echo 'Uh oh, something went wrong.';
  }
}

if (isset($_POST['submitChallenge']) && isset($_POST['groupName']) && isset($_POST['groupDesc'])){
  $uid =  $_SESSION['user_id'];
  $name = $_POST['groupName'];
  $q0 = "SELECT user_id FROM users WHERE name='{$name}'";
  $r0 = mysql_query($q0);
  if (!r0){
    echo 'Sorry, could not find person. Please ask him or her to join!';
  }else{
    $gid = mysql_result($r0,0);
    $description = $_POST['desc'];
    $q = "INSERT INTO users_activity(userId, action, entity, description) VALUES({$uid}, 'c', {$gid}, '{$description}')" ;
    $r = mysql_query($q);
    
    if (!$r){
      echo 'Uh oh, something went wrong.';
    }
  }
}


?>
