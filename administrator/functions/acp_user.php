<?php

//////////////////////////////////////////////////////////////////////////////
//* USERMANAGMENT v1.0	for pasterntCMS										//
//*																			//
//* AUTHOR: com98															//	
//* DATE: 19.09.2013														//
//*																			//
//////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////// SEPERATOR
// Function to list all aviable users.										//
////////////////////////////////////////////////////////////////////////////// SEPERATOR

function list_users(){
?>
<table width="100%">
<thead>
<tr>
<th>Username</th>
<th>E-Mail Adresse</th>
<th>Status</th>
<th>Bearbeitungsoptionen</th>
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM user";	
$query = mysql_query($sql);

while($row = mysql_fetch_object($query)) {
$userid = $row->id;
$username = $row->name;
echo "<tr>";
echo "<th>" .$username. "</th>";
echo "<th>" .$row->email. "</th>";

if($row->banned == 0) {
?><th><span class="success label">Freigeschalten</span></th><?
} else {
?><th><span class="alert label">Gebannt</span></th><?
}
?><th><?echo delete_user($userid);?> <?

if($row->banned == 0){
echo lockuser($userid). "</th>";
} else {
echo unlockuser($userid). " " .lockdetails($userid). "</th>";
}

}
echo "</tr>";
echo "</tbody>";
echo "</table>";
}


////////////////////////////////////////////////////////////////////////////// SEPERATOR
// Function to delete a User												//
////////////////////////////////////////////////////////////////////////////// SEPERATOR

function delete_user($userid){
	
if(isset($_POST['delnow'])){
$id = $_POST['userid'];
$sql = "DELETE FROM user WHERE id = " . $id;
$query = mysql_query($sql);

?><script>javascript:location.reload()</script><?
}
	
echo '<a href="#" data-reveal-id="'.$userid.'_delete" class="small button alert"><i class="foundicon-remove"></i> User entfernen</a>';
echo '<div id="'.$userid.'_delete" class="reveal-modal">'; 

$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);

?>
<div align="left">
<p>Bitte beachte: Einmal entferne User können <u><b>nicht</b></u> mehr wiederhergestellt werden (eine sehr lange Zeit)</p>
<p>Username des betroffenen Users: <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?></p>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" data-abide>
<input type="submit" value="User l&ouml;schen" name="delnow" class="button alert" />  <a onclick="$('#1').foundation('reveal', 'close');" class="button secondary" />User Begnadigen</a></div>
<input name="userid" type="hidden" value="<?echo $userid;?>" />
</form><a class="close-reveal-modal">&#215;</a>
</div>
<?
}


////////////////////////////////////////////////////////////////////////////// SEPERATOR
// Function to unlock or lock a user										//
////////////////////////////////////////////////////////////////////////////// SEPERATOR
function lockuser($userid){
	
if(isset($_POST['locknow'])){
$id = $_POST['userid'];
$reason = $_POST['banreason'];

$datum = date("d.m.Y");
$uhrzeit = date("H:i");

$sql = "UPDATE `user` SET `banned`=1,`banned_reason`='" .$reason. "',`banned_date`= '" .$datum. "', `banned_time`= '" .$uhrzeit. "' WHERE `id` = " . $id;
$query = mysql_query($sql);
?><script>javascript:location.reload()</script><?
}
	
echo '<a href="#" data-reveal-id="'.$userid.'_lock" class="small button alert"><i class="foundicon-remove"></i> User sperren</a>';
echo '<div id="'.$userid.'_lock" class="reveal-modal">'; 

$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);

?>
<div align="left">
<p>Einen User zu sperren ist eine Alternative zum kompletten entfernen. Der User kann sich solange nicht einloggen, bis er von einem
Administrator wieder freigegeben wird.</p>
<p>Username des betroffenen Users: <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?></p>
<p>Grund des Bannes (Optimal):</p>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" data-abide>
<p><input type="text" name="banreason" /></p>
<input type="submit" value="User Bannen" name="locknow" class="button alert" />  <a onclick="$('#1').foundation('reveal', 'close');" class="button secondary" />User Begnadigen</a></div>
<input name="userid" type="hidden" value="<?echo $userid;?>" />
</form><a class="close-reveal-modal">&#215;</a>
</div>
<?	

}

function unlockuser($userid){
if(isset($_POST['unlocknow'])){
$id = $_POST['userid'];

$sql = "UPDATE `user` SET `banned`=0,`banned_reason`='', banned_time='', banned_date='' WHERE `id` = " . $id;
$query = mysql_query($sql);
?><script>javascript:location.reload()</script><?
}
	
echo '<a href="#" data-reveal-id="'.$userid.'_unlock" class="small button success"><i class="foundicon-remove"></i> User entsperren</a>';
echo '<div id="'.$userid.'_unlock" class="reveal-modal">'; 

$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);

?>
<div align="left">
<p>Sobald ein User sich wieder benimmt und er wieder ins Team aufgenommen werden kann, kannst du ihn hier entbannen,
danach kann sich der User wieder einloggen und ihm stehen alle Rechter die er vor dem Ban hatte wieder zu.</p>
<p>Username des betroffenen Users: <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?></p>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" data-abide>
<input type="submit" value="User Entbannen" name="unlocknow" class="button success" />  <a onclick="$('#1').foundation('reveal', 'close');" class="button secondary" />Abbrechen</a></div>
<input name="userid" type="hidden" value="<?echo $userid;?>" />
</form><a class="close-reveal-modal">&#215;</a>
</div>
<?	
}

function lockdetails($userid)
{
$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);	

$sql2 = "SELECT * FROM user WHERE id = " .$userid;
$query2 = mysql_query($sql2);
$reason = mysql_fetch_assoc($query2);
	
echo '<a href="#" data-reveal-id="'.$userid.'_lockdetails" class="small button secondary"><i class="foundicon-remove"></i> Details zum Ban</a>';
echo '<div id="'.$userid.'_lockdetails" class="reveal-modal">'; 
?>
<div align="left">
<p>Der User <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?> wurde gebannt. Grund:</p>
<p><div class="panel"><?echo $reason['banned_reason'];?></div></p>
<p>Datum und Uhrzeit zum Zeitpunkt des Bans: <span class="secondary label"><?echo $reason['banned_date']. " " .$reason['banned_time'];?></span></p>
<a onclick="$('#1').foundation('reveal', 'close');" class="button alert" />Schließen</a>
<?
}


////////////////////////////////////////////////////////////////////////////// SEPERATOR
// Function to add a User													//
////////////////////////////////////////////////////////////////////////////// SEPERATOR


function adduser() {
include("acp_checkinput.php");
include ("../config.php");


if(isset($_POST['submite'])){
	


$name = check_input($_POST['name']);
$password = md5(md5($_POST['password']));
$email = check_input($_POST['email']);
$banned = "false";

$sql = "INSERT INTO user (`name`, `passwrd`, `email`, `banned`, `banned_reason`)
		VALUES (" .$name. ",'" .$password. "'," .$email. "," .$banned. ", '')";
		
$result = mysql_query($sql);
}
?>

<form method="post" action="<? echo $_SERVER['SCRIPT_NAME'];?>" data-abide>
<div class="name-field">
<label>Username <font color="#FE2E2E">*</font></label>
<input name="name" type="text" placeholder="Username" required pattern="[a-zA-Z0-9]+">
<small class="error">Bitte gib einen richtigen Username an.</small>
</div>
<div class="email-field">
<label>E-Mail <font color="#FE2E2E">*</font></label>
<input name="email" type="email" placeholder="E-Mail" required>
<small class="error">Bitte gib eine richtige E-Mail Adresse an.</small>
</div>


<div class="password-field">
<label>Passwort <font color="#FE2E2E">*</font></label>
<input name="password" type="text" placeholder="Passwort" required>
</div>
<p>Alle mit einem <font color="#FE2E2E">*</font> gekennzeichneten Felder m&uuml;ssen zwingend ausgef&uuml;llt werden</p>
<button name="submite" value="1" type="submit">Anlegen</button>
</form>
<?}
?>