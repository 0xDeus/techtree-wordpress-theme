<?php
/*
 * All the css and js assests enque
 * @techtree theme
 */

function techtree_scripts() {
    wp_enqueue_style( 'techtree-style', get_stylesheet_uri() );
    wp_enqueue_style( 'techtree-bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css' );
    wp_enqueue_style( 'techtree-custom-css', get_template_directory_uri().'/css/style.css' );

    wp_enqueue_script( 'techtree-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '20151215', true );
    wp_enqueue_script( 'techtree-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'techtree-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

    wp_enqueue_script( 'techtree-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'techtree_scripts' );