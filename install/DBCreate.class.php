<?php
require_once '../config.php';
class DBCreate
{
    public function createTables()
    {
        // Create the content table
        mysql_query('CREATE TABLE IF NOT EXISTS `content` (
        `header` text NOT NULL,
        `content` text NOT NULL,
        `site_id` int(11) NOT NULL AUTO_INCREMENT,
        UNIQUE KEY `site_id` (`site_id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;');

        // Create the navbar table
        mysql_query('CREATE TABLE IF NOT EXISTS `navbar` (
        `name` text NOT NULL,
        `url` text NOT NULL,
        `id` int(11) NOT NULL AUTO_INCREMENT,
        UNIQUE KEY `id` (`id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;');

        // Create user table
        mysql_query('CREATE TABLE IF NOT EXISTS `user` (
        `name` text NOT NULL,
        `passwrd` text NOT NULL,
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `email` varchar(255) NOT NULL,
        `banned` varchar(255) NOT NULL,
        `banned_reason` varchar(255) NOT NULL,
        UNIQUE KEY `id` (`id`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;');
    }

    public function fillDemoContent()
    {
        mysql_query("INSERT INTO `content` (`header`, `content`, `site_id`) VALUES (
        'Herzlich Willkommen', '<h2>Installation erfolgreich!</h2>Willkommen bei Ihrer Installation des pasterntCMS!', 1);") or die('demo'.mysql_error());
    }

    public function createAdmin($username, $password, $email)
    {
        $pw_encrypted = md5(md5($password));
        $sqlsec_mail = mysql_real_escape_string($email);
        $sqlsec_user = mysql_real_escape_string($username);
        
        mysql_query("INSERT INTO `user` (`name`, `passwrd`, `id`, `email`, `banned`, `banned_reason`) VALUES
        ('".$sqlsec_user."','".$pw_encrypted."', 1,'".$sqlsec_mail."' , '0', '');") or die('admin'.mysql_error());
    }
}
?>