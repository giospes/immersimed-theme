<?php
header("Content-type: text/css");
$font_url = get_template_directory_uri() . '/assets/fonts/Fontspring-DEMO-allroundgothic-demi.otf';
?>

@font-face {
    font-family: 'all-round-gothic-demi'; 
    src: url("<?php echo $font_url; ?>") format('opentype');
}
