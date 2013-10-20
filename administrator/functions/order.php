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
                    $id = $zeile['order'];
                    $text = $zeile['url'];
                    echo '<tr><td width=40%>';
                    echo $header;
                    echo '</td>';
                    echo '<td width=20%>';
                    up($id);
                    down($id);
                    echo '</td><td>';
                    echo '</td></tr>';
                }
?>
        </table>
<?php
    }
    function up($id){
        echo '<form action="order.php" method="POST"><input type="hidden" value="'.$id.'" name="id"><input type="hidden" value="up" name="action">
        <input type="submit" value="Hoch '.$id.'" name="submit" class="button small" />';
    }
    function down($id){
        echo '<form action="order.php" method="POST"><input type="hidden" value="'.$id.'" name="id"><input type="hidden" value="down" name="action">
        <input type="submit" value="Runter" name="submit" class="button small" />';
    }

function getInput(){
                include '../config.php';
                $action = $_POST['action'];
                echo $action;
                $id = $_POST['id'];
                echo $id;
                if($action == 'up'){
                        $id = $_POST['id'];
                        $id = checkinput($id);
                        $up = $id - 1;

                        echo $id;
                        echo $up;
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