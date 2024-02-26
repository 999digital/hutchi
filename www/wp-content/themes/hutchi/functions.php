<?php

if (!defined('ABSPATH')) exit;

require_once "inc/blocks.php";

function setup_theme() {
	add_theme_support( 'menus' );

	register_nav_menus(
        array(
            'menu-1' => __('Primary'),
            'menu-f1' => __('Footer 1'),
            'menu-f2' => __('Footer 2'),
            'menu-f3' => __('Footer 3'),
            'menu-f4' => __('Footer 4')
        )
    );

    add_theme_support( 'post-thumbnails', array( 'post' ) );
}
add_action( 'after_setup_theme', 'setup_theme' );

// Add scripts and stylesheets
function add_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap_js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( ), '5.2.3', false );
	wp_enqueue_script( 'popper', get_stylesheet_directory_uri() . '/js/popper.min.js', array(  ), '2.11.8', false );
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), '1.8.2', false );
    wp_enqueue_script( 'waypoints', get_stylesheet_directory_uri() . '/js/waypoints/jquery.waypoints.min.js', array('jquery'), '4.0.1', false );
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts');


/* Only use Gutenberg on pages */

function enable_block_editor_for_pages($use_block_editor, $post)
{
    if ($post->post_type == 'page') {
        return true;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'enable_block_editor_for_pages', 10, 2);

