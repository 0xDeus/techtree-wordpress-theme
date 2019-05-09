<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package techtree
 */

?>

<!-- Start get_in-->
<section class="get_in">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if ( is_active_sidebar( 'sidebar-before-footer-1' ) ) : ?>
                        <?php dynamic_sidebar( 'sidebar-before-footer-1' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3 text-center">
                <?php if ( is_active_sidebar( 'sidebar-before-footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-before-footer-2' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-3 text-center">
                <?php if ( is_active_sidebar( 'sidebar-before-footer-3' ) ) : ?>
                    <?php dynamic_sidebar( 'sidebar-before-footer-3' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ends get_in-->
</div><!-- #content -->
<!-- start footer-->
<footer class= "footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php endif; ?>


            </div>
            <div class="col-md-4">
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                <?php endif; ?>


            </div>
        </div>
        <div class="row tech">
            <div class="col-md-8">
                <p class="footer_text"> Techtree@ 2019</p>
            </div>
            <div class="col-md-4 footer_menu">
                <?php
                wp_nav_menu( array(
                    'theme_location'	=> 'footer',
                ) );
                ?>
            </div>
        </div>
    </div>
</footer>

<!-- ends footer-->

</div>
<!-- #page -->
<!-- Bootstrap core JavaScript -->
<?php wp_footer(); ?>

</body>

</html>

