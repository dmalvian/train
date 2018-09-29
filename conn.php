<?php
	$db_conf = array(
				"host"	=> "localhost",
				"user"	=> "root",
				"pass"	=> "",
				"db"	=> "pt_train");
				
	$link = new mysqli($db_conf['host'], $db_conf['user'], $db_conf['pass'], $db_conf['db']);
?>