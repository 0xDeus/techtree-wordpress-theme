<?php
/**
 * register all the widget
 */

function techtree_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'techtree' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'techtree' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s card my-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title card-header">',
        'after_title'   => '</h5>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Before footer 1', 'techtree' ),
        'id'            => 'sidebar-before-footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'techtree' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Before footer 2', 'techtree' ),
        'id'            => 'sidebar-before-footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'techtree' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Before footer 3', 'techtree' ),
        'id'            => 'sidebar-before-footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'techtree' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'techtree' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'techtree' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'techtree' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'techtree' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action( 'widgets_init', 'techtree_widgets_init' );