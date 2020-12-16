<?php


include("blade/blade.php");



require_once 'inc/includes/theme-support.php';

require_once 'inc/includes/post-types.php';


	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'thumbnail-crop', 280, 160, true );
		add_image_size( 'gallery-crop', 1300, 700, true );
		add_image_size( 'medium-crop', 600, 350, true );

	}
	function register_my_menu() {
	  register_nav_menu('main-menu',__( 'Main Menu' ));
	}
	add_action( 'init', 'register_my_menu' );

function oscillations_date_format( $post, $format = "std" ) {
	$post_type = $post->post_type;

	if($format=="std"){
		$m_format = "F";
	}else{
		$m_format = "M";
	}

	if($post_type=="event") {

        if(get_field('date_start')){
            if(get_field('date_end')){
                $date_start_ut = strtotime(get_field('date_start'));
                $date_end_ut = strtotime(get_field('date_end'));
                if(date_i18n("MY", $date_start_ut)==date_i18n("MY", $date_end_ut)){
                	$date_start = date_i18n("d", $date_start_ut);
                }else if(date_i18n("Y", $date_start_ut)==date_i18n("Y", $date_end_ut)){
                	$date_start = date_i18n("d ".$m_format, $date_start_ut);
                }else{
                	$date_start = date_i18n("d ".$m_format." Y", $date_start_ut);
                }
                $date_end = date_i18n("d ".$m_format." Y", $date_end_ut);
                return $date_start." - ". $date_end;
            }else{
            	$unixtimestamp = strtotime(get_field('date_start'));
                $date_start = date_i18n("d ".$m_format." Y", $unixtimestamp);
                return $date_start;
            }
        }

	}else if($post_type=="post"){
		return get_the_date( "d ".$m_format." Y", $post );
	}
}

function get_plural_name($post_type){
	$plural_name;
	switch (get_post_type()) {
	    case "artist":
	        $plural_name = "artists";
	        break;
	    case "project":
	        $plural_name = "projects";
	        break;
	    case "event":
	        $plural_name = "events";
	        break;
	    case "post":
	        $plural_name = "media";
	        break;
	}
	return $plural_name;
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
// Require the composer autoload for getting conflict-free access to enqueue
require_once __DIR__ . '/vendor/autoload.php';

// Instantiate
$enqueue = new \WPackio\Enqueue( 'oscillations', 'dist', '1.0.0', 'theme', __FILE__ );

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {
	wp_enqueue_script( 'jquery' );
	// wp_register_script( 'vibrant', get_stylesheet_directory_uri() . '/node_modules/node-vibrant/dist/vibrant.js', array('jquery'), '', true );
	// wp_enqueue_script( 'vibrant' );

	// Enqueue assets through wpackio/enqueue
	/**
	 * @var \WPackio\Enqueue
	 */
	global $enqueue;
	$enqueue->enqueue( 'theme', 'main', [] );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

function add_current_nav_class($classes, $item) {

   // Getting the current post details
   global $post;

   // Get post ID, if nothing found set to NULL
   $id = ( isset( $post->ID ) ? get_the_ID() : NULL );

   // Checking if post ID exist...
   if (isset( $id )){

       // Getting the post type of the current post
       $current_post_type = get_post_type_object(get_post_type($post->ID));

       // Getting the rewrite slug containing the post type's ancestors
       $ancestor_slug = $current_post_type->rewrite ? $current_post_type->rewrite['slug'] : '';

       // Split the slug into an array of ancestors and then slice off the direct parent.
       $ancestors = explode('/',$ancestor_slug);
       $parent = array_pop($ancestors);

       // Getting the URL of the menu item
       $menu_slug = strtolower(trim($item->url));

       // Remove domain from menu slug
       $menu_slug = str_replace($_SERVER['SERVER_NAME'], "", $menu_slug);

       // If the menu item URL contains the post type's parent
       if (!empty($menu_slug) && !empty($parent) && strpos($menu_slug,$parent) !== false) {
           $classes[] = 'current-menu-item';
       }

       // If the menu item URL contains any of the post type's ancestors
       foreach ( $ancestors as $ancestor ) {
           if (!empty($menu_slug) && !empty($ancestor) && strpos($menu_slug,$ancestor) !== false) {
               $classes[] = 'current-page-ancestor';
           }
       }
   }
   // Return the corrected set of classes to be added to the menu item
   return $classes;

}
// add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );

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
