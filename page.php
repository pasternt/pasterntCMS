<?php
    include 'config.php';
    include 'functions/page.php';
    include 'functions/checkinput.php';
?>
<!--Im Header nichts bearbeiten, außer den CSS-Files-->
<!DOCTYPE html>
<html>
  <head>
    <title><? echo $site_title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body background="img/bg.jpg">

<!--Navigation-->
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

      <a class="navbar-brand" href="index.php"><?php echo $site_title;?></a></div>
         <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">         
    <?php navi(); ?>
        </ul>
    <ul class="nav navbar-nav navbar-right">

    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
<!--Ende Navbar-->

<!--Anfang Contentbereich-->
      <div class="container content">
          <div class="panel panel-default">
            <div class="panel-body">

             <!--Ruft die Seite auf-->
                <?php
                    page();
                ?>
            </div>
        </div>
    <!--Footertext-->
  <div class="well">
    <?php footer(); ?>
</div>
</div>
<!--Ende Contentbereich-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>