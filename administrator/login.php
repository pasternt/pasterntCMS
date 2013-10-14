<?php
    session_start();
    include '../config.php';
    $gesendet = mysql_real_escape_string($_POST['sent']);
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
            

            $username = mysql_real_escape_string($_POST['username']);
            $passwort = mysql_real_escape_string($_POST['passwort']);
            $passwort= md5(md5($passwort));
            $sql = "SELECT * FROM `user` WHERE `name` = '$username'";
            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                            {
                                die('Ungültige Abfrage: ' . mysql_error());
                            }else { $meldung = 'Vorgang erfolgreich!';}
     
     while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
{
$password = $zeile['passwrd'];
$id = $zeile['id'];
$banned= $zeile['banned'];
}
if($password == $passwort and $banned == '0'){
        $_SESSION['angemeldet'] = true;
       $_SESSION['user'] = $username;
       $_SESSION['id'] = $id;
       header('Location: index.php');
       exit;
    }else{$meldung = 'Passwort / Nutzername falsch oder Nutzerkonto gesperrt';}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>pasterntCMS - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body background="img/bg.jpg">
      <br><br><br><br><br>
    <div class="container content">
        <div class="page-header">
            <h1>pasterntCMS <small class="text-error">Admin-CP</small></h1>
        </div>
<?
    if(isset($meldung)){
          echo '<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">&times;</button>';        
          echo '<h4>'.$meldung.'</h4>';
          echo 'Bitte Passwort / Nutzernamen &uuml;berpr&uuml;fen';
          echo '</div>';
    }?><center>
    <form action="login.php" method="post" class="form-inline">
        <img src="img/logo.png">
   <div class="input-prepend">
        <span class="add-on">Nutzername:</span>
        <input class="span2" name="username" type="text" placeholder="Nutzername">
    </div>&nbsp;
    <div class="input-prepend">
       <span class="add-on">Passwort:</span>
        <input class="span2" name="passwort" type="password" placeholder="Passwort">
        <input class="span2" name="sent" type="hidden" value="1">
    </div>
   <input type="submit" value="Anmelden" class="btn btn-primary"/>
        </form></center>
          </div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>