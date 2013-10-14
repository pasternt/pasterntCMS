<?php
function news(){ 
$xml = simplexml_load_file('http://dev.pasternt-cms.de/news.xml');   
   
   
foreach ( $xml->update as $user )   
{   
   $version_new = $user->version;
   $url = $user->url;
   $alias = $user->alias;
   $build = '5';
   if($build < $version_new){
       ?>
<div data-alert class="alert-box alert">
  Neuer Sicherheitspatch verf&uuml;gbar! Neue Version: <?php echo $alias; ?> | Upgradeguide / Changelog ist <?php echo '<a href="'.$url.'" target="_blank"';?><font color="white"><u>hier</u></font></a> zu finden.
  <a href="#" class="close">&times;</a>
</div>

<?php
   }    
}   
}
?>