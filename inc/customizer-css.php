<?php
/**
 * print out styles on homepage
 */

function tt_customized_styles_print(){
    ?>

    <style>
        <?php if (get_theme_mod('header_bg_color')): ?>
        body{
            background-color: <?php echo get_theme_mod('header_bg_color'); ?>;
        }
        <?php endif; ?>


        <?php if (get_theme_mod('tt_upload_top_section_image_setting')): ?>
            #top_section{
                background-image: url(<?php echo get_theme_mod('tt_upload_top_section_image_setting'); ?>);
            }
        <?php endif; ?>

        <?php if (get_theme_mod('top_section_title_color')): ?>
            #top_section h1{
                color: <?php echo get_theme_mod('top_section_title_color') ?>;
            }
        <?php endif; ?>

        <?php if (get_theme_mod('top_section_text_color')): ?>
            #top_section p{
                color: <?php echo get_theme_mod('top_section_text_color') ?>;
            }
        <?php endif; ?>

        <?php if (get_theme_mod('top_section_button_bg_color')): ?>
            #top_section .btn{
                background-color: <?php echo get_theme_mod('top_section_button_bg_color') ?>;
            }
        <?php endif; ?>
        <?php if (get_theme_mod('top_section_button_text_color')): ?>
            #top_section .btn{
                color: <?php echo get_theme_mod('top_section_button_text_color') ?>;
            }
        <?php endif; ?>

        /**
        css for about section
         */

        <?php if (get_theme_mod('about_section_bg_color')): ?>
            #about{
                background: <?php echo get_theme_mod('about_section_bg_color') ?>;
            }
        <?php endif; ?>
        <?php if (get_theme_mod('about_section_title_color')): ?>
            #about h2{
                color: <?php echo get_theme_mod('about_section_title_color') ?>;
            }
        <?php endif; ?>
    </style>
<?php
}
add_action('wp_head','tt_customized_styles_print');