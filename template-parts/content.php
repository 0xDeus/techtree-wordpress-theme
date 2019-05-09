<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techtree
 */

?>


<?php

if(is_singular()){
    get_template_part( 'template-parts/blog/blog', 'singular' );
}


if (is_home()){
    get_template_part( 'template-parts/blog/blog', 'home' );
}
?>

