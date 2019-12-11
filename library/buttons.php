<?php


function button_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'url' => '',
		'color' => 'grey',
		'download' => false
	), $atts );

	if ( !empty( $a['url'] ) && !empty( $content ) ) {
		return '<a href="' . $a['url'] . '" class="btn ' . $a['color'] . '"' . ( !empty( $a['download'] ) ? ' download="' . $a['download'] . '"' : '' ) . '>' . $content . '</a>';
	}
}
add_shortcode( 'button', 'button_shortcode' );

