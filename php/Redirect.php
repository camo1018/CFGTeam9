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

$_SESSION['name_name'] = $obj;

header( 'Location: Home.php' ) ;
exit();
?>