<?php
############################################
#     Config für pasterntCMS               #
############################################
$site_title = 'pasterntCMS';
$site_url = '';

############################################
#              MySQL-Details               #
############################################
$host = '';
$user = '';
$passwrd = '';
$db = '';

$connection=mysql_connect($host, $user, $passwrd) or die(mysql_error());

if(!$connection){
	die('Es konnte keine Verbindung zur Datenbank hergestellt werden');
}

mysql_select_db($db, $connection) or die(mysql_error());
?>
