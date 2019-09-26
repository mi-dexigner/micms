<?php 

function heading_shortcode( $atts, $content ){
    $tag = isset( $atts['tag'] ) ? $atts['tag'] : 'h1';
    $color = isset( $atts['color'] ) ? $atts['color'] : '#333333';
    return sprintf( '<%1$s style="color:%2$s;">%3$s</%1$s>', $tag, $color, $content );
}

add_shortcode('heading', 'heading_shortcode');
 ?>