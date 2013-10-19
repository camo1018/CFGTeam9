<?php

include 'core/init.php';

$curl_url = "https://jawbone.com/auth/oauth2/token?client_id=KsqTospR0zw&client_secret=39a34528b0fa268f309fca9b7e2208d8dd7ba881&grant_type=authorization_code&code=" . $_GET["code"];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $curl_url);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$obj = curl_exec($curl);
curl_close($curl);

$final_auth = json_decode($obj);

$_SESSION['access_code'] = $final_auth->{'access_token'};
/*
$access_token = $_SESSION['access_code'];
$date='sample2';
$page_token='sample1';
$start_time='';
$end_time='';

$url = "https://jawbone.com/nudge/api/users/@me/moves";
$my_header = array( 'http'=>array( 'method'=>"GET", 'header'=>"Accept: application/json\r\n" . "Authorization: Bearer " . $access_token . "\r\n"));
$context = stream_context_create($my_header);
$result = file_get_contents($url, false, $context);
$decoded_json = json_decode($result, true);

$url = "https://jawbone.com/nudge/api/users/@me/workouts";
$my_header = array( 'http'=>array( 'method'=>"GET", 'header'=>"Accept: application/json\r\n" . "Authorization: Bearer " . $access_token . "\r\n"));
$context = stream_context_create($my_header);
$result = file_get_contents($url, false, $context);
$decoded_json = json_decode($result, true);

$items_array = $decoded_json['data']['items'];
*/
$access_token = $_SESSION['access_code'];
$date='sample2';
$page_token='sample1';
$start_time='';
$end_time='';
$url = "https://jawbone.com/nudge/api/users/@me/moves";
$my_header = array( 'http'=>array( 'method'=>"GET", 'header'=>"Accept: application/json\r\n" . "Authorization: Bearer " . $access_token . "\r\n"));
$context = stream_context_create($my_header);
$result = file_get_contents($url, false, $context);
$decoded_json = json_decode($result, true);
echo '<br>';
//print "Walking: ".$decoded_json['data']['items'][0]['details']['calories']." calories";
//print "Walking Date:".$decoded_json['data']['items'][0]['details']['calories']." calories";
$items_array = $decoded_json['data']['items'];
//print var_dump($url);
for($k=0;$k<count($items_array);$k++)
{
	/*
	print "Calories: ".$items_array[$k]['details']['calories'];
	echo '<br>';
	print "Time: ".$items_array[$k]['time_completed'];
	echo '<br>';
	*/
	$type = 'M';
	$itemdate=date("Y-m-d",$items_array[$k]['time_completed']);
	sync($_SESSION['user_id'], $type, $items_array[$k]['details']['calories'],$itemdate);

}
$url = "https://jawbone.com/nudge/api/users/@me/workouts";
$my_header = array( 'http'=>array( 'method'=>"GET", 'header'=>"Accept: application/json\r\n" . "Authorization: Bearer " . $access_token . "\r\n"));
$context = stream_context_create($my_header);
$result = file_get_contents($url, false, $context);
$decoded_json = json_decode($result, true);
echo '<br>';
//print "Exercising: ".$decoded_json['data']['items'][0]['details']['calories']." calories";
$items_array = $decoded_json['data']['items'];
//print var_dump($url);
for($k=0;$k<count($items_array);$k++)
{
	/*
	print "Calories: ".$items_array[$k]['details']['calories'];
	echo '<br>';
	print "Time: ".$items_array[$k]['time_completed'];
	echo '<br>';
	*/
	$type = 'W';
	$itemdate=date("Y-m-d",$items_array[$k]['time_completed']);
	sync($_SESSION['user_id'], $type, $items_array[$k]['details']['calories'],$itemdate);

}

header( 'Location: index.php' ) ;
exit();
?>
