<?php
function oscillations_date_format( $post, $format = "std" ) {
	$post_type = $post->post_type;
	$post_id = $post->ID;
	if($format=="std"){
		$m_format = "F";
	}else{
		$m_format = "M";
	}

	if($post_type=="event") {

        if(get_field('date_start', $post_id)){
            if(get_field('date_end', $post_id)){
                $date_start_ut = strtotime(get_field('date_start', $post_id));
                $date_end_ut = strtotime(get_field('date_end', $post_id));
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
            	$unixtimestamp = strtotime(get_field('date_start', $post_id));
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
		$choice = rand(0, 10)."% ".rand(0, 10)."%, ".rand(90, 100)."% ".rand(0, 10)."%, ".rand(90, 100)."% ".rand(90, 100)."%, ".rand(0, 10)."% ".rand(90, 100)."%";
	}else{
		$choice = rand(0, 10)."% ".rand(0, 10)."%, ".rand(90, 100)."% ".rand(0, 10)."%, ".rand(90, 100)."% ".rand(90, 100)."%, ".rand(0, 10)."% ".rand(90, 100)."%";
	}
	$output = 'polygon('.$choice.')';

	return $output;
}

function format_related_item($post=null){
	if($post):
		$permalink = get_permalink( $post->ID );
		$title = get_the_title( $post->ID );
		$thumbnail = get_the_post_thumbnail_url($post->ID,'thumbnail-crop');

		$output = "<div>";
		$output .= "<div class='related-thumbnail'><a href='".esc_url( $permalink )."'><img src='".esc_url($thumbnail)."' alt='".$title."'></a></div>";
		$output .= "<div class='related-meta'>";
		$output .= "<a href='".esc_url( $permalink )."'><button class='view-more'>More info</button></a>";
		$output .= "<span class='title'>".$title."</span>";
		$output .= "</div>";
		$output .= "</div>";
		return $output;
	endif;

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
