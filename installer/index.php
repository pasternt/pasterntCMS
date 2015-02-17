<?php    
    require_once('lib/classes.php');
    $check = new Check();
    if(empty($_GET['download'])){
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>pasterntCMS - PreInstallation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 20px;
            color: #333;
            background-color: #fff;
            }
        .text-success {
            color: #468847;
            }
        .text-error {
                color: #b94a48;
                }
        h3 {
            font-size: 24.5px;
            }
        h4 {
            font-size: 17.5px;
            }
        hr {
            border: 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #fff;
            }
        .btn {
                display: inline-block;
                padding: 4px 12px;
                margin-bottom: 0;
                font-size: 14px;
                line-height: 20px;
                color: #333333;
                text-align: center;
                text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
                vertical-align: middle;
                cursor: pointer;
                background-color: #f5f5f5;
                background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
                background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
                background-repeat: repeat-x;
                border: 1px solid #cccccc;
                border-color: #e6e6e6 #e6e6e6 #bfbfbf;
                border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
                border-bottom-color: #b3b3b3;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffe6e6e6', GradientType=0);
                filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
                -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .btn-success {
            color: #ffffff;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
                background-color: #5bb75b;
                background-image: -moz-linear-gradient(top, #62c462, #51a351);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
                background-image: -webkit-linear-gradient(top, #62c462, #51a351);
                background-image: -o-linear-gradient(top, #62c462, #51a351);
                background-image: linear-gradient(to bottom, #62c462, #51a351);
                background-repeat: repeat-x;
                border-color: #51a351 #51a351 #387038;
                border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462', endColorstr='#ff51a351', GradientType=0);
                filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
                }
        a {
            text-decoration: none;
        }
    </style>
  </head>
  <body>
        <div style="margin-left: 15%; margin-top: 200px; width: 70%;">
        
        <h3>&Uuml;berpr&uuml;fung der Anforderungen:</h3>
            <hr>
        <p>Es wurde gepr&uuml;ft, ob alle n&ouml;tigen Erweiterungen vorhanden sind. Dies sind die Ergebnisse:</p>
            <ul>
                <!-- PHP-VERSION -->
                <li>PHP-Version (mind. 5.4.0): <?php if($check->checkPHP()) echo '<span class="text-success">Erf&uuml;llt</span>'; 
                                                     else echo '<span class="text-error">Nicht erf&uuml;llt</span>'; ?>
                </li>
                <!-- CURL -->
                <li>PHP-Erweiterung (cURL): <?php if($check->checkCurl()) echo '<span class="text-success">Vorhanden</span>'; 
                                                     else echo '<span class="text-error">Nicht vorhanden</span>'; ?>
                </li>
                <!-- MCRYPT -->
                <li>PHP-Erweiterung (MCRYPT): <?php if($check->checkMCRYPT()) echo '<span class="text-success">Vorhanden</span>'; 
                                                     else echo '<span class="text-error">Nicht vorhanden</span>'; ?>
                </li>
            </ul>
            <h4>Das CMS kann <?php if($check->checkAll())
                 echo '<span class="text-success">installiert</span>'; 
            else echo '<span class="text-error">nicht installiert</span>'; ?> werden!</h4>
            <hr>
            <?php
                if($check->checkAll()){
            ?>
               <a href="./install" class="btn btn-success" type="button" id="continue" style="display: none;">Fortfahren</a>
               <a href="#" class="btn btn-success" type="button" id="download">Dateien runterladen</a>
                <p id="dl_info" style="display: none;">Die Dateien werden heruntergeladen. Dies kann je nach Anbindung des Servers mehrere Minuten dauern.</p>

            <?php
                }
            ?>
        </div> 

    <script src="http://code.jquery.com/jquery.js"></script>
    <script>
        $(document).ready(function ()
        {

            $('#download').click(function ()
            {
                $('#download').hide();
                $('#dl_info').show();
                $.ajax({
                    type: "GET",
                    url: "index.php",
                    data: "download=true",
                    error: function ()
                    {
                        alert('Der Download ist fehlgeschlagen!');

                    },
                    success: function (html)
                    {
                        if (html == '0')
                        {
                            alert('Der Download ist fehlgeschlagen!');
                        } else
                        {
                            $('#dl_info').hide();
                            $('#continue').show();

                        }
                    }
                });

                return false;
            });
        });
    </script>
  </body>
</html>
<?php
    }else{
        if(!file_exists('download') && !is_dir('download')){
            mkdir('download');
        }
        chmod('download', 0777);

        $url = file_get_contents('http://217.160.19.137/getdownload.php');
        $ch = curl_init($url);
        $datei = fopen("download/pasterntcms.zip", "w");
        curl_setopt($ch, CURLOPT_FILE, $datei);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
        $curl = curl_exec($ch);
        fclose($datei);
        if($curl){
            echo 1;
            $path = getcwd();

            $do = explode('/', $path);
            $to_do = chmod('../'.$do[count($do )- 1],0777); 

            $zip = new ZipArchive;
            $res = $zip->open('download/pasterntcms.zip');
            if ($res === TRUE) {
              $zip->extractTo($path);
              $zip->close();
              $check->rrmdir('download');
              $check->rrmdir('lib');
              
              $check->chmod('core/app/storage', 0777);
            } else {
              echo 0;
            }
        }else{
            echo 0;
        }


    }
?>