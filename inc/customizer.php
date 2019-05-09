<?php
/**
 * coral-drive Theme Customizer
 *
 * @package coral-drive
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

//--------- Sanitize
function tt_sanitize_yesno($setting){ if ( 0==$setting || 1==$setting ) return $setting; return 1;}
function tt_sanitize_voffset($setting){ if (is_numeric($setting) && $setting>=0) return $setting; return 25;}
function tt_sanitize_voffset2($setting){ if (is_numeric($setting)) return $setting; return 0;}
function tt_sanitize_size($setting){ if (is_numeric($setting) && $setting>=0) return $setting; return 0;}
function tt_sanitize_logoheight($setting){ if (is_numeric($setting) && $setting>=40 && $setting<=300) return $setting; return 65;}
function tt_sanitize_typography($setting){
    $valid = array(
        "'Open Sans', sans-serif" => "Open Sans (google font)",
        "'Roboto Condensed', sans-serif" => "Roboto Condensed (google font)",
        "'Russo One', sans-serif" => "Russo One (google font)",
        "Arial, Helvetica, sans-serif" => "Arial, Helvetica, sans-serif",
        "'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
        "'Helvetica Neue', Helvetica, Arial, sans-serif" => "'Helvetica Neue', Helvetica, Arial, sans-serif",
        "'Comic Sans MS', cursive, sans-serif" => "'Comic Sans MS', cursive, sans-serif",
        "Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
        "'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
        "Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
        "'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
        "Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif",
        "Georgia, serif" => "Georgia, serif",
        "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
        "'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
        "'Courier New', Courier, monospace" => "'Courier New', Courier, monospace",
        "'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace"
    );

    if ( array_key_exists( $setting, $valid ) ) {
        return $setting;
    } else {
        return '';
    }
}
function tt_sanitize_pausetime($setting){ if (is_numeric($setting) && $setting>=0) return $setting; return 5000;}
function tt_sanitize_animspeed($setting){ if (is_numeric($setting) && $setting>=0) return $setting; return 500;}
function tt_sanitize_checkbox( $input ) {
    if ( $input == '1' ) {
        return '1';
    } else {
        return '';
    }
}
function tt_sanitize_radio( $input ) {
    $valid = array(
        '1' => __( 'Yes', 'techtree' ),
        '0' => __( 'No, I want to display my own images', 'techtree' ),
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function tt_sanitize_color_radio( $input ) {
    $valid = array(
        '1' => __( 'Black', 'techtree' ),
        '0' => __( 'White', 'techtree' ),
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function tt_sanitize_content_radio( $input ) {
    $valid = array(
        '1' => __( 'Maximum two widgets side by side', 'techtree' ),
        '0' => __( 'Content you set below', 'techtree' ),
    );

    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//---------- Controls
if ( class_exists( 'WP_Customize_Control' ) ) {

    class tt_Text_Description_Control extends WP_Customize_Control {
        public $description;

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <p class="description more-top"><?php echo ( $this->description ); ?></p>
                <input type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
            </label>
            <?php
        }
    }
}
function tt_customize_controls_print_styles() {
    ?>
    <style type="text/css">
        .customize-control-header .current .container {height: auto !important;}
    </style>
    <?php
}
add_action( 'customize_controls_print_styles', 'tt_customize_controls_print_styles' );

function tt_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => 'tt_customize_partial_blogname',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'tt_customize_partial_blogdescription',
    ) );

// Site title section panel ------------------------------------------------------
    $wp_customize->add_section( 'title_tagline', array(
        'title' => __( 'Logo, Site Title, Tagline, Icon', 'techtree' ),
        'description' => __( 'You can have either an image logo, or site title and tagline', 'techtree' ),
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'tt_logoheight_setting' , array(
        'default'           => 65,
        'sanitize_callback' => 'tt_sanitize_logoheight',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control( 'tt_logoheight_control', array(
        'label' 			=> __( 'Max. height of the logo in px', 'techtree' ),
        'section' 			=> 'title_tagline',
        'settings' 			=> 'tt_logoheight_setting',
        'priority' 			=> 9,
        'type' => 'number',
        'input_attrs' => array(
            'min' => 40,
            'max' => 300,
            'step' => 1,
        ),
    ) );
    $wp_customize->add_setting( 'blogname', array(
        'default'    => get_option( 'blogname' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'blogname', array(
        'label'      => __( 'Site Title', 'techtree' ),
        'section'    => 'title_tagline',
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'blogdescription', array(
        'default'    => get_option( 'blogdescription' ),
        'type'       => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'blogdescription', array(
        'label'      => __( 'Tagline', 'techtree' ),
        'section'    => 'title_tagline',
        'priority' => 20,
    ) );

// Header section panel ------------------------------------------------------
    $wp_customize->add_section( 'header_image', array(
        'title' => __( 'Frontpage Sections settings', 'techtree' ),
        'priority' => 23,
        'description' => __( 'Here you can set, on which pages the full page header with your header background image will be displayed', 'techtree' ),
    ) );

    $wp_customize->add_setting( 'show_frontpage_top_section', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'tt_sanitize_checkbox',
        'default' =>1,

    ) );

    $wp_customize->add_control( 'show_frontpage_top_section', array(
        'type' => 'checkbox',
        'section' => 'header_image', // Add a default or your own section
        'label' => __( 'Show top section','techtree' ),
    ) );



    $wp_customize->add_setting( 'tt_upload_top_section_image_setting' , array(
        'default'           => 'Upload image for top section background',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'top_section_bg_image',
            array(
                'label'      => __( 'Upload a image', 'techtree' ),
                'section'    => 'header_image',
                'settings'   => 'tt_upload_top_section_image_setting',

            )
        )
    );

    $wp_customize->add_setting( 'tt_header_title_text' , array(
        'default'           => 'Techtreev <br> wordpress <br> theme',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new tt_Text_Description_Control( $wp_customize, 'tt_header_title_control', array(
        'label' 			=> __( 'Header title text', 'techtree' ),
        'section' 			=> 'header_image',
        'settings' 			=> 'tt_header_title_text',
    ) ) );
    $wp_customize->add_setting('top_section_title_color',array(
        'default' => '#1ba9e1',
        'section' => 'header_image',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tt_header_bg', array(
        'label'   => __( 'Title Color', 'techtree' ),
        'description' => __( 'Select color for the title', 'techtree' ),
        'section' => 'header_image',
        'settings' => 'top_section_title_color',
    ) ));

    $wp_customize->add_setting( 'tt_header_text' , array(
        'default'           => 'CLICK THE BUTTON BELOW',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new tt_Text_Description_Control( $wp_customize, 'tt_header_text_control', array(
        'label' 			=> __( 'Header text', 'techtree' ),
        'section' 			=> 'header_image',
        'settings' 			=> 'tt_header_text',
    ) ) );


    $wp_customize->add_setting('top_section_text_color',array(
        'default' => '#000',
        'section' => 'header_image',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tt_header_text_color', array(
        'label'   => __( 'Text Color', 'techtree' ),
        'description' => __( 'Select color for the title', 'techtree' ),
        'section' => 'header_image',
        'settings' => 'top_section_text_color',
    ) ));

    $wp_customize->add_setting( 'button_text' , array(
        'default'           => 'Read more',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new tt_Text_Description_Control( $wp_customize, 'button_text_control', array(
        'label' 			=> __( 'Button text', 'techtree' ),
        'section' 			=> 'header_image',
        'settings' 			=> 'button_text',
    ) ) );
    $wp_customize->add_setting( 'header_button_link' , array(
        'default'           => '#',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new tt_Text_Description_Control( $wp_customize, 'header_button_link_control', array(
        'label' 			=> __( 'Header button link (start with http://)', 'techtree' ),
        'section' 			=> 'header_image',
        'settings' 			=> 'header_button_link',
    ) ) );
    $wp_customize->add_control( new tt_Text_Description_Control( $wp_customize, 'header_button_link_control', array(
        'label' 			=> __( 'Header button link (start with http://)', 'techtree' ),
        'section' 			=> 'header_image',
        'settings' 			=> 'header_button_link',
    ) ) );

    $wp_customize->add_setting('top_section_button_bg_color',array(
        'default' => '#1ba9e1',
        'section' => 'header_image',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_section_button_bg_color_setting', array(
        'label'   => __( 'Background color of button', 'techtree' ),
        'section' => 'header_image',
        'settings' => 'top_section_button_bg_color',
    ) ));

    $wp_customize->add_setting('top_section_button_text_color',array(
        'default' => '#fff',
        'section' => 'header_image',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_section_button_text_color_setting', array(
        'label'   => __( 'Button text', 'techtree' ),
        'section' => 'header_image',
        'settings' => 'top_section_button_text_color',
    ) ));




/*
 * about us section settings
 */
    $wp_customize->add_setting( 'show_frontpage_about_section', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'tt_sanitize_checkbox',
        'default' =>1
    ) );

    $wp_customize->add_control( 'show_frontpage_about_section', array(
        'type' => 'checkbox',
        'section' => 'header_image', // Add a default or your own section
        'label' => __( 'Show about section' ,'techtree'),
    ) );

    $wp_customize->add_setting('about_section_bg_color',array(
        'default' => '#fff',
        'section' => 'header_image',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tt_about_section_bg_color_control', array(
        'label'   => __( 'Background Color', 'techtree' ),
        'description' => __( 'Select color for the bg', 'techtree' ),
        'section' => 'header_image',
        'settings' => 'about_section_bg_color',
    ) ));


    $wp_customize->add_setting( 'tt_upload_map_image_setting' , array(
        'default'           => 'Upload map image',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tt_upload_map_image',
            array(
                'label'      => __( 'Upload a image', 'techtree' ),
                'section'    => 'header_image',
                'settings'   => 'tt_upload_map_image_setting',
            )
        )
    );

    $wp_customize->add_setting( 'tt_about_header_title_text' , array(
        'default'           => 'About US',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new tt_Text_Description_Control( $wp_customize, 'tt_about_header_title_control', array(
        'label' 			=> __( 'Header title text', 'techtree' ),
        'section' 			=> 'header_image',
        'settings' 			=> 'tt_about_header_title_text',
    ) ) );
    $wp_customize->add_setting('about_section_title_color',array(
        'default' => '#1ba9e1',
        'section' => 'header_image',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tt_about_section_title_color_control', array(
        'label'   => __( 'Title Color', 'techtree' ),
        'description' => __( 'Select color for the title', 'techtree' ),
        'section' => 'header_image',
        'settings' => 'about_section_title_color',
    ) ));



    $wp_customize->add_setting( 'tt_about_header_p_text', array(
        'capability' => 'edit_theme_options',
        'default' => 'Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet Lorem Ipsum Dolor Sit amet ',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'tt_about_header_p_text', array(
        'type' => 'textarea',
        'section' => 'header_image', // // Add a default or your own section
        'label' => __( 'Content text','techtree' ),
    ) );










// Color section panel
}
add_action( 'customize_register', 'tt_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tt_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tt_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tt_customize_preview_js() {
    wp_enqueue_script( 'tt_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tt_customize_preview_js' );


