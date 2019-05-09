<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package techtree
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<!-- start Navigation -->
<div class="header header_with_top_bg">
    <nav class="navbar navbar-expand-lg static-top">
        <div class="container">

                <?php
                /**
                 * showing custom
                 * @return $logo || sitename
                 */
                if ( has_custom_logo() ) {
                    the_custom_logo();
}               else {
                    if ( is_front_page() && is_home() ) :
                        ?>
                        <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                    <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                    endif;
                }

                ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                    <?php
                    wp_nav_menu( array(
                        'theme_location'	=> 'primary',
                        'depth'				=> 1, // 1 = with dropdowns, 0 = no dropdowns.
                        'container'			=> 'div',
                        'container_class'	=> 'collapse navbar-collapse',
                        'container_id'		=> 'navbarResponsive',
                        'menu_class'		=> 'navbar-nav ml-auto',
                        'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
                        'walker'			=> new WP_Bootstrap_Navwalker()
                    ) );
                    ?>
        </div>
    </nav>
</div>
<!-- end Navigation -->
    <div id="content" class="site-content">


