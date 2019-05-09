<?php
/**
 * about section template
 */
?>

<!--start About us-->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h2> <?php echo get_theme_mod('tt_about_header_title_text','About');?></h2>
                    <p class="Justify-content-center">
                        <?php echo get_theme_mod('tt_about_header_p_text');?>
                    </p>


                </div>
                <!--heading-->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php if (get_theme_mod('tt_upload_map_image_setting') !='' ){?>
                            <img src="<?php echo get_theme_mod('tt_upload_map_image_setting') ?>"  class="img-fluid mt-5" alt="" >
                        <?php }else{ ?>
                        <img src="<?php echo get_template_directory_uri() ?>/img/maf_2.png"  class="img-fluid mt-5" alt="" >
                        <?php } ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#maincontent -->
<!--end About-->
