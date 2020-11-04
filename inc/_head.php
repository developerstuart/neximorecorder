<meta charset="UTF-8">

<title><?php echo $meta_title; ?></title>
<meta name="description" content="<?php echo $meta_description; ?>">

<link rel="canonical" href="<?php echo $url; ?>">
<?php if(!$global_production) { ?>
<meta name="robots" content="noindex,nofollow">
<?php } ?>

<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="dns-prefetch" href="//<?php echo $_SERVER['HTTP_HOST']; ?>">
<link rel="dns-prefetch" href="//fonts.googleapis.com">

<meta property="og:title" content="<?php echo $social_title; ?>">
<meta property="og:description" content="<?php echo $social_description; ?>">
<meta property="og:image" content="<?php echo $url_resources; ?>images/photos/<?=$social_image;?>.png?v=<?=$global_version; ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:url" content="<?php echo $url; ?>">
<meta property="og:type" content="website">

<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="<?php echo $url; ?>">
<meta name="twitter:title" content="<?php echo $social_title; ?>">
<meta name="twitter:description" content="<?php echo $social_description; ?>">
<meta name="twitter:image" content="<?php echo $url_resources; ?>images/photos/<?=$social_image;?>.png?v=<?=$global_version; ?>">

<script type="text/javascript">
    var siteURL = '<?php echo $url; ?>';
    var submitURL = '<?php echo $url_submit; ?>';
    var facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=%url%';
    var twitterURL = 'https://twitter.com/intent/tweet?text=%url%';
    var twitterText = '<?php echo $twitter_text; ?>';
    var embedURL = '<?php echo $url_embed; ?>';
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<style type="text/css">
    body {
        font-family: Arial;
        color: black;
        background-color: #ebebeb;
    }

</style>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Baloo+Chettan" rel="stylesheet">
<style type="text/css">
<?php
    $css = file_get_contents("resources/css/general.css");
    $css = str_replace("../", $url_resources, $css);
    echo $css;
?>
</style>
<?php /*<link rel="stylesheet" href="<?php echo $url_resources; ?>css/general.css?v=<?=$global_version; ?>" media="all"> */ ?>
