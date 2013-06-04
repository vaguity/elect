<?php

// Unregister the HTML5 Boilerplate sidebar

function remove_html5bp_sidebar() {
	unregister_sidebar( 'sidebar-1' );
}

add_action( 'widgets_init', 'remove_html5bp_sidebar', 11 );

// Register the global sidebar

function register_global_sidebar() {
	register_sidebar(array(
		'name' => __( 'Global Sidebar' ),
		'id' => 'global-sidebar',
		'description' => __( 'The global sidebar appears on most pages on the site.' ),
		'before_widget' => "\n\t",
		'after_widget' => "\n",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

add_action( 'widgets_init', 'register_global_sidebar' );

// Register the primary and social nav menus

function register_custom_menus() {
  register_nav_menus(
    array( 
    	'primary-navigation' => __( 'Primary Navigation' ),
    	'social-navigation' => __( 'Social Navigation' ),
    )
  );
}

add_action( 'init', 'register_custom_menus' );

// Add custom theme options
if (is_admin()) {
	require_once ( get_stylesheet_directory() . '/inc/elect-theme-options.php' );
}

?>