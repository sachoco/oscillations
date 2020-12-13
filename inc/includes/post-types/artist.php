<?php
	// let's create the function for the custom type
	function custom_post_artist() {
		// creating (registering) the custom type
		register_post_type( 'artist', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 'labels' => array(
				'name' => __( 'Artists', 'oscillations' ), /* This is the Title of the Group */
				'singular_name' => __( 'Artist', 'oscillations' ), /* This is the individual type */
				'all_items' => __( 'All Artists', 'oscillations' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'oscillations' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Artist', 'oscillations' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'oscillations' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Artist', 'oscillations' ), /* Edit Display Title */
				'new_item' => __( 'New Artist', 'oscillations' ), /* New Display Title */
				'view_item' => __( 'View Artist', 'oscillations' ), /* View Display Title */
				'search_items' => __( 'Search Artist', 'oscillations' ), /* Search Custom Type Title */
				'not_found' =>  __( 'Nothing found in the Database.', 'oscillations' ), /* This displays if there are no entries yet */
				'not_found_in_trash' => __( 'Nothing found in Trash', 'oscillations' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'Artists', 'oscillations' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
				'menu_icon' => 'dashicons-admin-users', /* the icon for the custom post type menu */
				'rewrite'	=> array( 'slug' => 'artist', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => 'artists', /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'excerpt', 'custom-fields', 'thumbnail', 'revisions', 'sticky'),
				'show_in_rest' => true,
			) /* end of options */
		); /* end of register post type */

	}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_artist');

	