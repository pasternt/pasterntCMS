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
     $sql = "SELECT * FROM  `navbar`";
            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysql_error());
                }
                while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
                {
                    $header = $zeile['name'];
                    $id = $zeile['id'];
                    $text = $zeile['url'];
                    echo '<tr><td width=40%>';
                    echo $header;
                    echo '</td>';
                    echo '<td width=20%>';
                    echo del_site($id);
                    echo '</td><td>';
                    echo edit_site($id);
                    echo '</td><td>';
                    echo '</td></tr>';
                }
?>
        </table>
<?php
    }
    //Neue Seite erstellen
function add_nav()
{
    ?>
<a href="#" data-reveal-id="create" class="small button success"><i class="foundicon-add-doc"></i> Navigationspunkt erstellen</a>
<div id="create" class="reveal-modal"> 
    <h2>Neuen Navigationspunkt erstellen</h2>
      <form action="navi.php" method="post" data-abide>
        <input type="text" name="titel" size="20" placeholder="Titel" required><br>URL:
        <input type="text" name="url" size="20" placeholder="http://" required><br>
        <input type="submit" value="Nav-Punkt erstellen" name="submit" class="button success" />
        <input type="hidden" value="add" name="action" />
    </form>    <script>
    CKEDITOR.replace( 'content' );
</script>      <a class="close-reveal-modal">&#215;</a>
</div>
<?php
}
function del_site($id){
    
echo '<a href="#" data-reveal-id="'.$id.'_delete" class="small button alert"><i class="foundicon-remove"></i> L&ouml;schen</a>
<div id="'.$id.'_delete" class="reveal-modal">'; 
//Seite löschen
            //$id = check_input($id);
            $sql = "SELECT * FROM  `navbar` WHERE id = $id";

            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysql_error());
                }
            while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
                {
                    $header = $zeile['name'];
                }
?> 
    <h2>Wirklich l&ouml;schen?</h2>
    <form action="navi.php" method="post" data-abide>
        <input type="submit" value="L&ouml;schen!" name="submit" class="button alert" />
        <input type="hidden" value="delete" name="action" />
        <?php echo '<input type="hidden" value="'.$id.'" name="id" />';?>
    </form>      <a class="close-reveal-modal">&#215;</a>
</div>
<?php    
}
    function edit_site($id)
    {
       echo '<a href="#" data-reveal-id="'.$id.'_edit" class="small button"><i class="foundicon-tools"></i> URL bearbeiten</a>
<div id="'.$id.'_edit" class="reveal-modal">'; 
//Seite bearbeiten
            $sql = "SELECT * FROM  `navbar` WHERE id = $id";

            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysql_error());
                }
            while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
                {
                    $header = $zeile['name'];
                    $content = $zeile['url'];
                }
?> 
    <h2>URL bearbeiten</h2>
    
      <form action="navi.php" method="post" data-abide>
        <?php echo '<input type="text" name="titel" size="20" placeholder="Titel" value="'.$header.'" required><br>'; ?>
        <?php echo '<input type="text" name="url" size="20" placeholder="URL" value="'.$content.'" required>'; ?><br>
        <input type="submit" value="URL bearbeiten" name="submit" class="button success" />
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
                        $content = $_POST['url'];
                        $content = check_input($content);
                        $sql = "INSERT INTO navbar (name, url) VALUES ($titel, $content)";
                        if(!mysql_query($sql)){
                            $error = mysql_error();
                            echo '<div data-alert class="alert-box alert">
                                Navigationspunkt konnte nicht erfolgreich angelegt werden! '.$error.'
                                <a href="#" class="close">&times;</a>
                                </div>';
                        } else {
                        echo '<div data-alert class="alert-box success">
                                Navigationspunkt erfolgreich angelegt!
                                <a href="#" class="close">&times;</a>
                                </div>';
                        }
                }  
                                if($action == 'delete'){
                                    include '../config.php';
                        $id = $_POST['id'];
                        //$id = check_input($id);

                        
                        $sql = "DELETE FROM `navbar` WHERE `id` = $id LIMIT 1";
                                                        
                        if(!mysql_query($sql)){
                            $error = mysql_error();
                            echo '<div data-alert class="alert-box alert">
                                Navigationspunkt konnte nicht erfolgreich gel&ouml;scht werden! '.$error.'
                                <a href="#" class="close">&times;</a>
                                </div>';
                        } else {
                        echo '<div data-alert class="alert-box success">
                                Navigationspunkt erfolgreich gel&ouml;scht!
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
                        $content = $_POST['url'];
                        $content = check_input($content); 
                        $sql = "UPDATE navbar SET name = $header, url = $content WHERE id = ' $id'"; 
                        if(!mysql_query($sql)){
                            $error = mysql_error();
                            echo '<div data-alert class="alert-box alert">
                                Navigationspunkt konnte nicht erfolgreich bearbeitet werden! '.$error.'
                                <a href="#" class="close">&times;</a>
                                </div>';
                        } else {
                        echo '<div data-alert class="alert-box success">
                                Navigationspunkt erfolgreich bearbeitet!
                                <a href="#" class="close">&times;</a>
                                </div>';
                        }
                }
                 
            } 
?>