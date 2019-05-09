<?php
/**
 * Top section template
 */

?>



<!-- start Slider -->
<section id="top_section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1 class="top_heading">
                    <?php echo get_theme_mod('tt_header_title_text')?>

                </h1>
                <?php if (get_theme_mod('tt_header_text')): ?>
                <p><?php echo get_theme_mod('tt_header_text')?></p>
                <?php endif; ?>
                <?php if (get_theme_mod('header_button_link')): ?>
                <a class="btn btn-primary" href="<?php echo get_theme_mod('header_button_link')?>"><?php echo get_theme_mod('button_text','Read more')?></a>
                <?php endif; ?>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /#main_content -->
