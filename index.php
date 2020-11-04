<?php
   // include("config.php");
   // include("inc/_setup.php");

    $room = preg_replace("/[^A-z0-9]/", "", $_GET['room']);

    $room_dir = "roomdata/{$room}";

    $ip = $_SERVER['REMOTE_ADDR'];

    $userType = 1;

    if(file_exists("{$room_dir}/user1.txt") && file_get_contents("{$room_dir}/user1.txt") != $ip) {
        $userType = 2;
    }

    //$handle = fopen("{$room_dir}/user{$userType}.txt", "w+");
    //fwrite($handle, $ip);
    //fclose($handle);


    ob_start();


?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8"> <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9"> <![endif]-->
<!--[if gt IE 9]>  <html class="ie"> <![endif]-->
<!--[if !IE]><!--> <html>             <!--<![endif]-->
    <head>
        <?php include("inc/_head.php"); ?>

        <script type="text/javascript">
        </script>
    </head>
    <body class="body-loading nojs">

        <div class="screen1">

            <div class="script">
                <?php echo file_get_contents("script.html"); ?>
            </div>


            <div class="callform">
               
                    <label>Person 1</label>
                    <div class="input">
                        491781808769
                    </div>
                    <label>Person 2</label>
                    <div class="input">
                        447983589786
                    </div>
                    <button class="start">Start</button>
              

                <div class="mp3">
                    Mp3 ready? <span class="js_mp3">No</span>

                    <audio id="audio" controls="false">
                        <source id="mp3Source" type="audio/mp3" src=""></source>
        Your browser does not support the audio format.
                    </audio>
                </div>
            </div>
            
        </div>
        <script type="text/javascript" src="resources/js/general-min.js"></script>
    </body>
</html>

<?php
    $html = ob_get_clean();
    $html = preg_replace("/[\s\t\r\n]{2,}/", " ", $html);
    if(!isset($show_graphic) || $show_graphic)
        echo $html;

    //$handle = fopen("index.html", "w+");
    //fwrite($handle, $html);
    //fclose($handle);
?>
