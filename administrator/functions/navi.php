<?php
	
function navi()
{
  ?>
  <nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="#">pasterntCMS</a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">
      <li class="divider"></li>
      <li><a href="index.php">Startseite</a></li>
      <li class="divider"></li>
      <li><a href="sites.php">Seiten</a></li>
      <li class="divider"></li>
      <li><a href="navi.php">Navigation</a></li>
      <li class="divider"></li>
      <li><a href="users.php">Userverwaltung</a></li>
      <li class="divider"></li>
      <li><a href="about.php">About</a></li>       
      <li class="divider"></li>
    </ul>
        <!-- Right Nav Section -->
    <ul class="right">
      <li class="divider hide-for-small"></li>
      <li class="has-dropdown"><a href="#">Hallo, <?php echo $_SESSION['user'];?></a>

        <ul class="dropdown">
          <li><a href="users.php">Passwort &auml;ndern</a></li>
          <li class="divider"></li>
          <li><a href="logout.php">Logout &rarr;</a></li>
        </ul>
      </li>
      <li class="divider"></li> 
    </ul>
  </section>
</nav><?
}
?>
