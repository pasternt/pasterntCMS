<?php
function show()
    {
        include '../config.php';
        ?>
<table width="100%">
    <thead>
    <tr>
        <th>&Uuml;berschrift</th>
        <th>Aktionen</th>
        <th></th>
        <th></th>

    </tr>
  </thead>
    <tbody>
    
 <?php
     $sql = "SELECT * FROM  `content`";
            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysql_error());
                }
                while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
                {
                    $site = $_SERVER['HTTP_HOST'];
                    $header = $zeile['header'];
                    $id = $zeile['site_id'];
                    $text = $zeile['content'];
                    echo '<tr><td width=40%>';
                    echo $header;
                    echo '</td>';
                    echo '<td width=20%>';
                    echo del_site($id);
                    echo '</td><td>';
                    echo edit_site($id);
                    echo '</td><td>';
                    echo '<a href="http://',$site,'/page.php?id=',$id,'" target="_blank" class="small button">Seite anschauen</a> ';
                    echo '</td></tr>';
                }
?>
        </table>
<?php
    }
    //Neue Seite erstellen
function add_site()
{
    ?>
<a href="#" data-reveal-id="create" class="small button success"><i class="foundicon-add-doc"></i> Seite erstellen</a>
<div id="create" class="reveal-modal"> 
    <h2>Neue Seite erstellen</h2>
      <form action="sites.php" method="post" data-abide>
        <input type="text" name="titel" size="20" placeholder="Titel" required><br>
        <textarea cols="80" id="content" name="content" rows="10" required></textarea><br>
        <input type="submit" value="Seite erstellen" name="submit" class="button success" />
        <input type="hidden" value="add" name="action" />
    </form>    <script>
    CKEDITOR.replace( 'content' );
</script>      <a class="close-reveal-modal">&#215;</a>
</div>
<?php
}
function del_site($id){
    if($id == '1'){
        echo '<a href="#" class="small button alert disabled"><i class="foundicon-remove"></i> <span data-tooltip class="has-tip" title="Diese Seite ist die Startseite, welche nicht gelöscht werden kann.">Seite l&ouml;schen</span></a>
<div id="'.$id.'_delete" class="reveal-modal">'; 
    }else{
echo '<a href="#" data-reveal-id="'.$id.'_delete" class="small button alert'.$actr.'"><i class="foundicon-remove"></i> Seite l&ouml;schen</a>
<div id="'.$id.'_delete" class="reveal-modal">';}
//Seite löschen
            //$id = check_input($id);
            $sql = "SELECT * FROM  `content` WHERE site_id = $id";

            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysql_error());
                }
            while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
                {
                    $header = $zeile['header'];
                }
?> 
    <h2>Seite wirklich l&ouml;schen?</h2>
        <p>Bitte beachte: Einmal gelöschte Seiten können <u><b>nicht</b></u> mehr wiederhergestellt werden</p>
            <p>Seitenname: <?php echo '<span class="secondary label">'.$header.'</span>';?></p>
    <form action="sites.php" method="post" data-abide>
        <input type="submit" value="Seite l&ouml;schen" name="submit" class="button alert" />
        <input type="hidden" value="delete" name="action" />
        <?php echo '<input type="hidden" value="'.$id.'" name="id" />';?>
    </form>      <a class="close-reveal-modal">&#215;</a>
</div>
<?php    
}
    function edit_site($id)
    {
       echo '<a href="#" data-reveal-id="'.$id.'_edit" class="small button"><i class="foundicon-tools"></i> Seite bearbeiten</a>
<div id="'.$id.'_edit" class="reveal-modal">'; 
//Seite bearbeiten
            $sql = "SELECT * FROM  `content` WHERE site_id = $id";

            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysql_error());
                }
            while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
                {
                    $header = $zeile['header'];
                    $content = $zeile['content'];
                }
?> 
    <h2>Seite bearbeiten</h2>
    
      <form action="sites.php" method="post" data-abide>
        <?php echo '<input type="text" name="titel" size="20" placeholder="Titel" value="'.$header.'" required><br>'; ?>
        <?php echo '<textarea cols="80" class="ckeditor" id="edit" name="edit" rows="10" required >'.$content.'</textarea>'; ?><br>
        <input type="submit" value="Seite bearbeiten" name="submit" class="button success" />
        <input type="hidden" value="edit" name="action" />
        <?php echo '<input type="hidden" value="'.$id.'" name="id" />';?>
    </form>      <a class="close-reveal-modal">&#215;</a>
</div> 
<?php
    }
            function getInput(){
                include '../config.php';
                $action = $_POST['action'];
                if($action == 'add'){
                        $titel = $_POST['titel'];
                        $titel = htmlentities(check_input($titel));
                        $content = $_POST['content'];
                        $content = check_input($content);
                        $sql = "INSERT INTO content (header, content) VALUES ($titel, $content)";
                        if(!mysql_query($sql)){
                            $error = mysql_error();
                            echo '<div data-alert class="alert-box alert">
                                Seite konnte nicht erfolgreich angelegt werden! '.$error.'
                                <a href="#" class="close">&times;</a>
                                </div>';
                        } else {
                        echo '<div data-alert class="alert-box success">
                                Seite erfolgreich angelegt!
                                <a href="#" class="close">&times;</a>
                                </div>';
                        }
                }  
                                if($action == 'delete'){
                                    include '../config.php';
                        $id = $_POST['id'];
                        //$id = check_input($id);

                        
                        $sql = "DELETE FROM `content` WHERE `site_id` = $id LIMIT 1";
                                                        
                        if(!mysql_query($sql)){
                            $error = mysql_error();
                            echo '<div data-alert class="alert-box alert">
                                Seite konnte nicht erfolgreich gel&ouml;scht werden! '.$error.'
                                <a href="#" class="close">&times;</a>
                                </div>';
                        } else {
                        echo '<div data-alert class="alert-box success">
                                Seite erfolgreich gel&ouml;scht!
                                <a href="#" class="close">&times;</a>';

                                echo '</div>';
                        }
                } 
                if($action == 'edit'){
                    include '../config.php';
                        $id = $_POST['id'];
                        $id = $id;
                        $header = $_POST['titel'];
                        $header = htmlentities(check_input($header));
                        $content = $_POST['edit'];
                        $content = check_input($content); 
                        $sql = "UPDATE `content` SET `header` =  $header, `content` = $content WHERE  `content`.`site_id` = $id;";
                        if(!mysql_query($sql)){
                            $error = mysql_error();
                            echo '<div data-alert class="alert-box alert">
                                Seite konnte nicht erfolgreich bearbeitet werden! '.$error.'
                                <a href="#" class="close">&times;</a>
                                </div>';
                        } else {
                        echo '<div data-alert class="alert-box success">
                                Seite erfolgreich bearbeitet!
                                <a href="#" class="close">&times;</a>
                                </div>';
                        }
                }
                 
            } 
?>