<?php
include("blade/blade.php");
require_once 'inc/includes/theme-setup.php';
require_once 'inc/includes/theme-functions.php';

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
