<article  id="post-<?php the_ID(); ?>" <?php post_class('col-md-4'); ?>>
    <div class="card">
        <?php techtree_post_thumbnail(); ?>
        <div class="card-body">
            <?php the_title( '<h2 class="entry-title card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

            <div class="entry-meta">
                <?php
                techtree_posted_on();
                techtree_posted_by();
                ?>
            </div><!-- .entry-meta -->
            <p class="card-text">
                <?php
                $body = get_the_content();
                echo substr($body,0,200);
                ?>

            </p>
            <a href="<?php esc_url( the_permalink() )  ?>" class="btn btn-primary">Read more</a>
        </div>
        <footer class="card-footer">
            <?php techtree_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div>




</article><!-- #post-<?php the_ID(); ?> -->

