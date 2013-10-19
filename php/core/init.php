<?php
    //turn off error reporting so its not ugly
    error_reporting(0);
    //start a session
    session_start();
    //include connect file 
    require 'database/connect.php';
    //include general functions
    require 'functions/general.php';
    //include user functions
    require 'functions/users.php';
    $errors = array();
?>