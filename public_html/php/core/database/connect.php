<?php
    //This code will connect to the database
    $connect_error = 'Sorry, we\'re experiencing connection problems.';
        mysql_connect ("ec2-54-221-102-63.compute-1.amazonaws.com", "root", "bitnami")
	    or die($connect_error);
        mysql_select_db("manafitness");	
 ?>