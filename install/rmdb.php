<?php

require_once "../config.php";
//mysql_query("DROP TABLE IF EXISTS `user`;");
//mysql_query("DROP TABLE IF EXISTS `content`;");
//mysql_query("DROP TABLE IF EXISTS `navbar`;");
mysql_query("UPDATE user WHERE name=`admin` SET banned=1");

?>