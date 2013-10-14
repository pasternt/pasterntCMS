<?php
    //Klassen zur Seitenverwaltung
class seiten {
    
        function getAdd(){    //Seite adden

echo '<a href="#" data-reveal-id="create" class="small button success"><i class="foundicon-add-doc"></i> Neue Seite erstellen</a>
<div id="create" class="reveal-modal"> 
    <h2>Neue Seite erstellen</h2>
      <form action="sites.php" method="post" data-abide>

        <input type="text" name="titel" size="20" placeholder="Titel" required><br>
        <textarea cols="80" id="content" name="content" rows="10" required></textarea><br>
        <input type="submit" value="Seite erstellen" name="submit" class="button success" />
        <input type="hidden" value="1" name="sent" />

    </form>    <script>
    CKEDITOR.replace( 'content' );
</script>      <a class="close-reveal-modal">&#215;</a>
</div>';            }
            function getInput(){
                $sent = $_POST['sent'];
                if(isset($sent)){
                if($sent == '1'){
                        $titel = $_POST['titel'];
                        $titel = check_input($titel);
                        $content = $_POST['content'];
                        $content = check_input($content);
                        echo $titel;
                        echo $content;
                }
                }  
            } 
            function action($action){
               
                if($action == 'show') {
                        return $this->getShow();
                } elseif($action == 'edit') {
                        return $this->getEdit();       
                } elseif($action == 'input_check') {
                        return $this->getInput();       
                }
 
                }   
        }
?>