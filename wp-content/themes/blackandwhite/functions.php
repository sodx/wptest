<?php
require_once  'inc/assets.php';
require_once  'inc/widgets.php';
require_once  'inc/sidebars.php';
require_once  'inc/metaboxes.php';


/////////////REGISTER MENUS///////////////
register_nav_menus( array(
	 'menutop' => 'Menu Top',
	'menubottom'  => 'Menu Bottom',
));


/////////////INIT AND REGISTER GOOGLE MAP///////////////
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyBtNlgVo5Gk2oC8wkCUaaSDawF6E5Lmq-Q';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



/////////////CUT POST EXCERPT///////////////
function new_excerpt_length($length) {
	return 10;
}
add_filter('excerpt_length', 'new_excerpt_length');


/////////////CROP IMAGE SIZES///////////////
add_theme_support ('post-thumbnails');
add_image_size ('thumbnail', 221, 163, true);



/////////////GET AUTHOR QUERY///////////////
function rj_add_query_vars_filter( $vars ){
    $vars[] = "authormeta";
    return $vars;
}
add_filter( 'query_vars', 'rj_add_query_vars_filter' );
get_query_var('authormeta');



/////////////AJAX INIT///////////////
add_action("wp_ajax_single", "get_single");
add_action("wp_ajax_nopriv_single", "get_single");



/////////////AJAX DISPLAY BOOKS FROM AUTHORS///////////////
function get_single(){
	global $post;
	$author = $_REQUEST['author'];
	$args = array( 
		'post_type' => 'books',
		 'meta_query' => array(
			   array(
				   'key' => 'authors_meta_name',
				   'value' => $author,
				   'compare' => '=',
			   )
		),
		'posts_per_page' => -1);
	
		$query = new WP_Query( $args );
		if( $query->have_posts() ) :
			while( $query->have_posts() ): $query->the_post();
				echo '<h2>' . $query->post->post_title . '</h2>';
			endwhile;
			wp_reset_postdata();
		else :
			echo 'No posts found';
		endif;
		die();
}

?>