<?php
    $global_version = 2.7;

    if(!isset($url))
        $url = "http://{$_SERVER['HTTP_HOST']}";

    if(!isset($url_resources))
        $url_resources = "{$url}/resources/";

    if(!isset($url_local))
        $url_local = $url;

    if(!isset($url_submit))
        $url_submit = "{$url}/submit";

    if(!isset($url_embed))
        $url_embed = "{$url}/embed";

    if(!isset($global_production))
        $global_production = false;

    if(!function_exists('html')) {
        function html($str) {
            return htmlentities($str, ENT_QUOTES | ENT_HTML5);
        }
    }

    if(!function_exists('nl2p')) {
        function nl2p($str) {
            $str = nl2br($str);
            $str = preg_replace("/(<br \/>\s+){2,}/", "</p><p>", $str);
            $str = "<p>{$str}</p>";
            return $str;
        }
    }


    $meta_title = "Nexmo Recorder";
    $meta_description = $meta_title;

    $social_title = $meta_title;
    $social_description = $meta_title;

    $twitter_text = $settings -> social_twitter_text -> text;

    $social_image = "facebook";
?>
