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
  <title>pasterntCMS | ACP - About</title>

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
  <div class="large-3 columns"><a href="http://pasternt-cms.de/" target="_blank"><img src="img/logo.png"></a></div>
  <div class="large-9 columns"><h1>pasterntCMS <small>About</small></h1><hr>
        <h3>Die Developer</h3>
      <p>Ein besonderer Dank geht an unsere Dev's, welche immer flei&szlig;ig mitgemacht haben. </p>
      <p>Das w&auml;ren:</p>
      <p><li>Tim - Chefdeveloper</li><br>
         <li>Lukas - Vize-Chefdeveloper</li><br>
          <br>
    <h3>Die Unterst&uuml;tzer</h3>
          <p>Wabru.net<br>storage-plan.org<br>Breiter-Host<br>Artock-Hosting</p>
      </p>
        
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
