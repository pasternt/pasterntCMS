<?php
#######################################################################
#######################################################################
##                                                                   ##
##              Funktionen für die Seitenanzeige                     ##
##                                                                   ##
#######################################################################
#######################################################################
//Startseite
function index() {
    $sql = "SELECT * FROM  `content` WHERE site_id = 1"; 
    $db_erg = mysql_query( $sql );
        if ( ! $db_erg )
            {
                echo 'Ung&uuml;ltige Abfrage: ' . mysql_error();
            }
        while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
            {
                $header = $zeile['header'];
                $content = $zeile['content'];
                echo '<div class="page-header"><h1>';
                echo $header;
                echo '</div></h1>';
                echo $content;

            }
                mysql_free_result( $db_erg );

}

//Zusätzliche Seiten
function page() {
    $id = $_GET['id'];
        if (!isset($id)){header( 'Location: index.php' ) ;}
            $id = check_input($id);
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
                    echo '<div class="page-header"><h1>';
                    echo $header;
                    echo '</div></h1>';
                    echo $content;
                }
mysql_free_result( $db_erg );
if(!isset($content)){
   ?>
            <div class="page-header">
                <h1 class="text-danger text-center"> O.o 404 <small>Die angeforderte Seite konnte nicht gefunden werden...</small></h1>
            </div>
            <center><div class="alert alert-danger"><strong>Die gew&uuml;nschte Seite konnte nicht gefunden werden!</strong><br>
            </div><a href="javascript:history.back();">Zur&uuml;ck</a></center>
<?php
}    
}

//Navigation
function navi() {
            $sql = "SELECT * FROM navbar";
            // ORDER BY `order` ASC 
        $db_erg = mysql_query( $sql );
        if ( ! $db_erg )
            {
                die('Ungültige Abfrage: ' . mysql_error());
            }
        while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
            {
                $url = $zeile['url'];
                $name = $zeile['name'];
                    echo "<li><a href=$url>$name</a></li>";
            }    
}

//Footertext
function footer() {
    echo '<center>powered by <a href="http://pasternt-cms.de/" target="_blank">pasterntCMS</a>';
}
?>