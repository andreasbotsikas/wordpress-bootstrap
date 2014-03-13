<?php

// Various string used as pll_e('the key'); or
// echo pll__('the key');
// 1st argument is the display name and the next one is the original text
pll_register_string('Home Page Slider', 'SliderId');

// Image sizes
add_image_size( 'lgreco-product', 210, 350, false);

// shortcodes

// wines
// Color/Aromas/ Taste 

 function getwinediv($type, $content){
    $output = '<div class="wineproperty ' . $type . ' row">';
    $output .= '<span class="col-xs-2"><img src="' . get_template_directory_uri() . '/images/wines/' . $type . '.png"/></span>';
    $output .= '<span class="col-xs-10">' . $content . '</p>';
    $output .= '</div>';
    return $output;
}

function winecolor( $atts, $content = null ) {
    return getwinediv('color',$content);
}

add_shortcode('winecolor', 'winecolor'); 

function winearomas( $atts, $content = null ) {
    return getwinediv('aromas',$content);
}

add_shortcode('winearomas', 'winearomas'); 

function winetaste( $atts, $content = null ) {
    return getwinediv('taste',$content);
}

add_shortcode('winetaste', 'winetaste'); 

?>