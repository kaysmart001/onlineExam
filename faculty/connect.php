<?php
	
$link = mysql_connect('localhost', 'root', 'b0kubh00t');
		if (!$link) {
    	die('Could not connect: ' . mysql_error());
		}

$db_selected = mysql_select_db('pre_registration', $link);
if (!$db_selected) {
   die ('Can\'t open form submit database : ' . mysql_error());
}
	


?>