<?php
/**
* teplate for singular blog post
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container pt-5'); ?>>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4"><?php the_title(); ?></h1>

            <!-- Author -->
            <p class="lead">
                <a href="#"><?php techtree_posted_by(); ?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <?php
            techtree_posted_on();
            ?>

            <hr>
            <?php
            if (has_post_thumbnail()):
            ?>
            <!-- Preview Image -->
            <div class="image_container text-center">
                <?php techtree_post_thumbnail(); ?>
            </div>
            <hr>
            <?php endif; ?>

            <!-- Post Content -->
            <?php the_content() ?>
            <hr>
            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            the_post_navigation();
            ?>
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>

    </div>
    <!-- /.row -->

</article>


