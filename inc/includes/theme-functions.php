<?php
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

function random_clip_path($post_type = 'artist'){
	if($post_type=='event'){
		$choices = array(
			'8% 0, 100% 0%, 92% 100%, 0 100%',
			'0 0%, 92% 0%, 100% 100%, 8% 100%',
		);
	}else{
		$choices = array(
			'0 0, 100% 8%, 100% 100%, 0 92%',
			'0 8%, 100% 0%, 100% 92%, 0 100%',
		);
	}

	$choice = array_rand($choices,1);
	$output = 'polygon('.$choices[$choice].')';
	return $output;
}

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
