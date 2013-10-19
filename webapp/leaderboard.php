<?php
    include 'core/init.php';

    function get_top_10() {
	$query = mysql_query("SELECT `user_id`, `total_points` 
	FROM `points_earned` 
	ORDER BY `total_points` DESC 
	LIMIT 10;");
	echo "<ol>";

	while ($row = mysql_fetch_array($query)) {
		echo '<li>'.first_name_from_user_id($row['user_id']). ' ' . last_name_from_user_id($row['user_id']).' - '. $row['total_points']. ' points</li>';
	}
	echo"</ol>";
    }
?>
    
