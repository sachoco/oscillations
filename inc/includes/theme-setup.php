<?php
require_once 'post-types.php';

function register_my_menu() {
	register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'thumbnail-crop', 280, 160, true );
	add_image_size( 'gallery-crop', 1300, 700, true );
	add_image_size( 'medium-crop', 600, 350, true );
}


// add_action( 'mb_relationships_init', function() {
//     MB_Relationships_API::register( [
//         'id'         => 'events_to_artists',
// 				'from'   => [
// 					'object_type' => 'post',
// 					'post_type'   => 'event',
// 					'meta_box'    => [
// 							'title' => 'Related Artists',
// 					],
// 				],
// 				'to'   => [
// 					'object_type' => 'post',
// 					'post_type'   => 'artist',
// 					'meta_box'    => [
// 							'title' => 'Related Events',
// 					],
// 				]
//     ] );
// } );

/**
 * Edit the default query for event archive page
 * @param  [type] $query [description]
 * @return [type]        [description]
 */
function event_post_order( $query ){
    // if this is not an admin screen,
    // and is the event post type archive
    // and is the main query
    if( ! is_admin()
        && $query->is_post_type_archive( 'event' )
        && $query->is_main_query() ){

	   $query->set('orderby', 'meta_value_num');
       $query->set('meta_key', 'date_start');
       $query->set('order', 'DESC');
        // add the meta query and use the $compare var
        $today = date( 'Ymd' );
        $meta_query = array(
        	'relation' => 'AND',
        	array(
	            'key' => 'date_start',
	            'value' => $today,
	            'compare' => "<",
	            'type' => 'NUMERIC'
	        ),
	        array(
	            'key' => 'date_end',
	            'value' => $today,
	            'compare' => "<",
	            'type' => 'NUMERIC'
	        )
        );
        $query->set( 'meta_query', $meta_query );
    }
}
add_action( 'pre_get_posts', 'event_post_order' );
