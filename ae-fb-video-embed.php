<?php
/*
Plugin Name: AE FB Video Embed
Plugin URI: https://wordpress.org/plugins/ae-fb-video-embed/
Version: 1.0
Description: This plugin will help you embed public fb videos on your wordpress site
Author: Allan Empalmado
Author URI: http://allanempalmado.tk
*/
?>
<?php

function ae_initfbsdk($content)
{
    return '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=194091124089318";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>' . $content;
    
}

add_filter ('the_content',"ae_initfbsdk");

function ae_fb_start_embed_video($atts ) {
      $a = shortcode_atts( array(
        'url' => 'https://www.facebook.com/facebook/videos/10153415714906729/',
        'width' => 500
    ), $atts );
    
    $width = $a['width'];
    $fburl = $a['url'];
    
	return '<div class="fb-video" data-href="'.$fburl.'" data-width="'.$width.'"><div class="fb-xfbml-parse-ignore"></div></div>';
}
add_shortcode( 'ae-fb-embed', 'ae_fb_start_embed_video' );


