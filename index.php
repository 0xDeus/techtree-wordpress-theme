<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package techtree
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


		<?php
        //loading top section

if (get_theme_mod('show_frontpage_top_section')==true){
    get_template_part( 'template-parts/section', 'top' );
}

if (get_theme_mod('show_frontpage_about_section')==true){
    get_template_part( 'template-parts/section', 'about' );
}


		if ( have_posts() ) :
			/* Start the Loop */
            ?>
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12 text-center mb-5">
                        <div class="title">
                            <h2><?php echo __('Recent post', 'techtree')?></h2>
                        </div>
                        <!-- /.title -->
                    </div>
                    <!-- /.col-md-12 -->


        <?php while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; ?>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        <?php



		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
