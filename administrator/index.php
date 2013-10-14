<?php
    include 'functions/navi.php';
    include 'functions/acp_footer.php';
    include 'functions/acp.php';
    include '../config.php';
    include 'functions/auth.php';
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>pasterntCMS | ACP - Dashboard</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />

  <!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="css/app.css" />

  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>
<?php navi() ?>
<div class="row">
  <div class="large-12 columns"><?php news();?> </div></div>
<div class="row">
  <div class="large-3 columns"><a href="http://pasternt-cms.de/" target="_blank"><img src="img/logo.png"></a></div>
  <div class="large-9 columns"><h1>pasterntCMS <small>Dashboard</small></h1><hr>
        <p>Vielen Dank daf&uuml;r, dass du unser CMS nutzt. Momentan befindet sich unser CMS noch in der Closed-Beta, weshalb wir &uuml;ber jeden Bug-Report uns freuen.</p>
        <p>Desweiteren m&ouml;chten wir dir gratulieren, dass du es in die Closed-Beta geschafft hast. Habe Spa&szlig; mit dem pasterntCMS!</p><br>
        <h2>Infos</h2><hr>
        <p>Version: <span class="success label">0.2.2</span></p>
        <p>Status des CMS: <span class="radius secondary label" data-tooltip class="has-tip" title="Closed-Beta ist ein Zustand, in dem noch Bug's auftreten k&ouml;nnen. ">Closed-Beta</span></p></div>
</div>

<?php
    footer();
?>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.alerts.js"></script>
  <script src="js/foundation/foundation.clearing.js"></script>
  <script src="js/foundation/foundation.cookie.js"></script>
  <script src="js/foundation/foundation.dropdown.js"></script>
  <script src="js/foundation/foundation.forms.js"></script>
  <script src="js/foundation/foundation.joyride.js"></script>
  <script src="js/foundation/foundation.magellan.js"></script>
  <script src="js/foundation/foundation.orbit.js"></script>
  <script src="js/foundation/foundation.placeholder.js"></script>
  <script src="js/foundation/foundation.reveal.js"></script>
  <script src="js/foundation/foundation.section.js"></script>
  <script src="js/foundation/foundation.tooltips.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
  <script src="js/foundation/foundation.interchange.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
