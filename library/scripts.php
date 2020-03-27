<?php


// include the main.js script in the header on the front-end.
function p_scripts() {
	wp_enqueue_script( 'p-main-js', get_stylesheet_directory_uri().'/js/main.js?v=2', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'p_scripts' );


if ( function_exists('register_sidebar') ) {
 	register_sidebar(array(
		'name'=> 'Blog Sidebar',
		'id' => 'sidebar-blog',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title"><h4>',
        'after_title' => '</h4></div>',
    ));
}

