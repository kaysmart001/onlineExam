<?php
	
$link = mysql_connect('sql311.epizy.com', 'epiz_33459705', 'hvZgW4p2guu7');
		if (!$link) {
    	die('Could not connect: ' . mysql_error());
		}

$db_selected = mysql_select_db('epiz_33459705_cbtexam_db', $link);
if (!$db_selected) {
   die ('Can\'t open form submit database : ' . mysql_error());
}
	


?>
