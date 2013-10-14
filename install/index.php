<?php
session_start();

$_SESSION['stepfinished'] = FALSE;
if (!isset($_SESSION['step']))
{
    $_SESSION['step'] = 1;
}
else
{
    if ($_SESSION['stepfinished'] == true)
    {
        $_SESSION['step'] += 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>pasterntCMS Installation</title>
    </head>
    <body>
        <h2>Installation</h2>
        <form action="install.php" method="post">
            Username:&nbsp; <input type="text" name="user" /><br />
            E-Mail:&nbsp; <input type="email" name="mail" /><br />
            Passwort:&nbsp; <input type="password" name="password" /><br />
            Demo-Inhalte:&nbsp; <input type="checkbox" name="democontent" value="yes" /><br />
            <input type="submit" value="Installieren" />
        </form>
    </body>
</html>
