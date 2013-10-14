<?php
require 'DBCreate.class.php';
$installer = new DBCreate();
$installer->createTables();

if (isset($_POST['democontent']) && $_POST['democontent'] == "yes")
{
    $installer->fillDemoContent();
}

$installer->createAdmin($_POST['user'], $_POST['password'], $_POST['mail']);

echo '<h1>Erfolgreich installiert!';
?>