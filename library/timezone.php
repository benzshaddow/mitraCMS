<?php
	include_once 'database.php';
	$tabletime = new WisasiTable('setting');
	$currentTime = $tabletime->findBy(id_setting, '1');
	$currentTime = $currentTime->current();
	$timezone_set = $currentTime->timezone;
	date_default_timezone_set(''.$timezone_set.'');
?>
