<?php
function scriptsInit() {
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', '1', true );
	wp_register_script( 'remodal', get_template_directory_uri() . '/js/remodal.min.js', true );
	wp_register_script( 'js', get_template_directory_uri() . '/js/js.js', true );
	wp_register_script( 'bootstrap-carousel', get_template_directory_uri() . '/js/bootstrap-carousel.js', true );
	wp_register_script( 'bootstrap-transition', get_template_directory_uri() . '/js/bootstrap-transition.js', true );
	wp_register_script( 'googlemapjs', get_template_directory_uri() . '/js/googlemap.js', true );
	wp_register_script( 'googlemap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBtNlgVo5Gk2oC8wkCUaaSDawF6E5Lmq-Q', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap-carousel' );
	wp_enqueue_script( 'bootstrap-transition' );
	wp_enqueue_script( 'remodal' );
	wp_enqueue_script( 'js' );
	wp_enqueue_script( 'googlemapjs' );
	wp_enqueue_script( 'googlemap' );
}
add_action( 'wp_enqueue_scripts', 'scriptsInit' );

function stylesInit() {
	wp_register_style( 'style', get_template_directory_uri() . '/css/style.css', '1', true );
	wp_register_style( 'remodal', get_template_directory_uri() . '/css/remodal.css', '1', true );
	wp_register_style( 'remodal-theme', get_template_directory_uri() . '/css/remodal-default-theme.css', '1', true );
	wp_enqueue_style( 'style' );
	wp_enqueue_style( 'remodal' );
	wp_enqueue_style( 'remodal-theme' );
}
add_action( 'wp_enqueue_scripts', 'stylesInit' );


add_action( 'wp_enqueue_scripts', 'theme_register_scripts', 1 );
function theme_register_scripts() {
	/** Register JavaScript Functions File */
	wp_register_script( 'functions-js', esc_url( trailingslashit( get_template_directory_uri() ) . 'functions.js' ), array( 'jquery' ), time(), true );

	/** Localize Scripts */
	$php_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
	wp_localize_script( 'functions-js', 'php_array', $php_array );
}
	/** Enqueue Scripts. */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
	wp_enqueue_script( 'functions-js' );
}



?>