<?php

function theme_support(){
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
    add_theme_support( 'customizer' );
}
add_action('after_setup_theme', 'theme_support');

function menus() {
    $location = array(
        'primary' => "Desktop Primary Header Menu",
        'footer' =>"Footer Menu Items"
    );

    register_nav_menus($location);
}
add_action('init', 'menus');

function enqueue_style() {
    $version = wp_get_theme()->get('Version');

    // Enqueue Bootstrap CSS
    // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '5.3.0', 'all');

    // nel caso sposti il style.css cambia in get_template e il path
    // Enqueue Custom CSS (style.css)
    wp_enqueue_style('style', get_stylesheet_uri() , array(), $version, 'all');
    wp_enqueue_style('header-css', get_template_directory_uri('style') . '/assets/css/header.css', array('style'), $version, 'all');
    wp_enqueue_style('footer-css', get_template_directory_uri('style') . '/assets/css/footer.css', array('style'), $version, 'all');
    if (!is_front_page()) {
        wp_enqueue_style('pages-style', get_template_directory_uri('style') . '/assets/css/page.css');
        if(is_page('Contatti')){
            wp_enqueue_style('contatti-style', get_template_directory_uri('style') . '/assets/css/contatti.css');
        }
        if(is_single()){
            wp_enqueue_style('single-style', get_template_directory_uri('style') . '/assets/css/single.css');
        }
    }
    else{
        wp_enqueue_style('front-page-css', get_template_directory_uri('style') . '/assets/css/front-page.css', array('style'), $version, 'all');
    }
    


}
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_js() {
    
    $version = wp_get_theme()->get('Version');
   
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $version, true);

    wp_enqueue_script('header-js', get_template_directory_uri() . '/assets/js/header.js', array('jquery'), $version, true);

    if(is_front_page()){
        wp_enqueue_script('front-page-js', get_template_directory_uri() . '/assets/js/front-page.js', array('jquery'), $version, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_js');


function widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )

    );
}
add_action('widgets_init', 'widget_areas');


function custom_theme_customizer_settings( $wp_customize ) {
    // Desktop Logo
    $wp_customize->add_setting( 'desktop_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'desktop_logo', array(
        'label'    => 'Desktop Logo',
        'section'  => 'title_tagline',
        'settings' => 'desktop_logo',
        
    ) ) );

    // Mobile Logo
    $wp_customize->add_setting( 'mobile_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mobile_logo', array(
        'label'    => 'Mobile Logo',
        'section'  => 'title_tagline',
        'settings' => 'mobile_logo',
        
    ) ) );

    // Front page
    $wp_customize->add_panel('front_page_panel', array(
        'title' => 'Front Page Panel',
        'priority' => 2,
    ));
        $wp_customize->add_section('front_page_hero', array(
            'title' => 'Front Page Hero',
            'priority' => 3,
            'panel' =>'front_page_panel'
        ));

            // H1 Text
            $wp_customize->add_setting('front_page_h1', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_h1', array(
                'type' => 'text',
                'section' => 'front_page_hero',
                'label' => 'Front Page H1',
            ));

            // Hero Images
            $wp_customize->add_setting('front_page_hero_desktop_image', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_hero_desktop_image', array(
                'section' => 'front_page_hero',
                'label' => 'Front Page Desktop Hero Image',
            )));

            $wp_customize->add_setting('front_page_hero_tablet_image', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_hero_tablet_image', array(
                'section' => 'front_page_hero',
                'label' => 'Front Page tablet Hero Image',
            )));

            $wp_customize->add_setting('front_page_hero_mobile_image', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_hero_mobile_image', array(
                'section' => 'front_page_hero',
                'label' => 'Front Page Mobile Hero Image',
            )));

            // header text
            $wp_customize->add_setting('front_page_hero_text', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_hero_text', array(
                'type' => 'textarea',
                'section' => 'front_page_hero',
                'label' => 'Front Page Hero Text',
            ));

            // CTA Text
            $wp_customize->add_setting('front_page_hero_cta', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_hero_cta', array(
                'type' => 'text',
                'section' => 'front_page_hero',
                'label' => 'Front Page Hero CTA Text',
            ));

            // Social Proof text
            $wp_customize->add_setting('front_page_hero_social_proof', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_hero_social_proof', array(
                'type' => 'textarea',
                'section' => 'front_page_hero',
                'label' => 'Front Page Hero Social Proof',
            ));

            $wp_customize->add_setting('front_page_hero_soc_proof_img_1', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_hero_soc_proof_img_1', array(
                'section' => 'front_page_hero',
                'label' => 'Social Proof 1 img',
            )));

            $wp_customize->add_setting('front_page_hero_soc_proof_img_2', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_hero_soc_proof_img_2', array(
                'section' => 'front_page_hero',
                'label' => 'Social Proof 2 img',
            )));

            $wp_customize->add_setting('front_page_hero_soc_proof_img_3', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_hero_soc_proof_img_3', array(
                'section' => 'front_page_hero',
                'label' => 'Social Proof 3 img',
            )));

            



            

            $wp_customize->add_setting('front_page_under_hero_image_1', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_under_hero_image_1', array(
                'section' => 'front_page_hero',
                'label' => 'Parlano di noi 1 img',
            )));

            $wp_customize->add_setting('front_page_under_hero_image_2', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_under_hero_image_2', array(
                'section' => 'front_page_hero',
                'label' => 'Parlano di noi 2 img',
            )));

            $wp_customize->add_setting('front_page_under_hero_image_3', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_under_hero_image_3', array(
                'section' => 'front_page_hero',
                'label' => 'Parlano di noi 3 img',
            )));

        //perchè section
        $wp_customize->add_section(new WP_Customize_Section($wp_customize, 'per_section', array(
            'title' => 'Perchè section',
            'priority' => 31, // Adjust the priority to position the nested section
            'panel' => 'front_page_panel', // Specify the parent section's ID
        )));
            //section title
            $wp_customize->add_setting('front_page_per_title', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_per_title', array(
                'type' => 'textarea',
                'section' => 'per_section',
                'label' => 'Card title',
            ));

            //section description
            $wp_customize->add_setting('front_page_per_description', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_per_description', array(
                'type' => 'textarea',
                'section' => 'per_section',
                'label' => 'Descrizione Sezione',
            ));
        
            // Add Image Field for Nested Section
            $wp_customize->add_setting('front_page_per_card_1_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
            
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_per_card_1_img', array(
                'label' => 'Card-1 Image',
                'section' => 'per_section',
                'settings' => 'front_page_per_card_1_img',
            )));

            $wp_customize->add_setting('front_page_per_card_1_text', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_per_card_1_text', array(
                'type' => 'textarea',
                'section' => 'per_section',
                'label' => 'Card 1 text',
            ));
        
            $wp_customize->add_setting('front_page_per_card_2_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_per_card_2_img', array(
                'label' => 'Card-2 Image',
                'section' => 'per_section',
                'settings' => 'front_page_per_card_2_img',
            )));

            $wp_customize->add_setting('front_page_per_card_2_text', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_per_card_2_text', array(
                'type' => 'textarea',
                'section' => 'per_section',
                'label' => 'Card 2 text',
            ));

            $wp_customize->add_setting('front_page_per_card_3_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_per_card_3_img', array(
                'label' => 'Card-3 Image',
                'section' => 'per_section',
                'settings' => 'front_page_per_card_3_img',
            )));

            $wp_customize->add_setting('front_page_per_card_3_text', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_per_card_3_text', array(
                'type' => 'textarea',
                'section' => 'per_section',
                'label' => 'Card 3 text',
            ));



        $wp_customize->add_section(new WP_Customize_Section($wp_customize, 'vantaggi_section', array(
            'title' => 'Vantaggi Section',
            'priority' => 10, // Adjust the priority to position the nested section
            'panel' => 'front_page_panel', // Specify the parent section's ID
        )));

            $wp_customize->add_setting('front_page_vant_section_title', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_vant_section_title', array(
                'type' => 'textarea',
                'section' => 'vantaggi_section',
                'label' => 'Title Section',
            ));

            $wp_customize->add_setting('front_page_vant_vant_1_title', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_vant_vant_1_title', array(
                'type' => 'textarea',
                'section' => 'vantaggi_section',
                'label' => 'vantaggio 1 Title',
            ));

            $wp_customize->add_setting('front_page_vant_vant_1_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_vant_vant_1_img', array(
                'label' => 'Vantaggio 1 Image',
                'section' => 'vantaggi_section',
                'settings' => 'front_page_vant_vant_1_img',
            )));
            
            $wp_customize->add_setting('front_page_vant_vant_1_description', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_vant_vant_1_description', array(
                'type' => 'textarea',
                'section' => 'vantaggi_section',
                'label' => 'vantaggio 1 Description',
            ));

            $wp_customize->add_setting('front_page_vant_vant_2_title', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_vant_vant_2_title', array(
                'type' => 'textarea',
                'section' => 'vantaggi_section',
                'label' => 'vantaggio 2 Title',
            ));

            $wp_customize->add_setting('front_page_vant_vant_2_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_vant_vant_2_img', array(
                'label' => 'Vantaggio 2 Image',
                'section' => 'vantaggi_section',
                'settings' => 'front_page_vant_vant_2_img',
            )));
            
            $wp_customize->add_setting('front_page_vant_vant_2_description', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_vant_vant_2_description', array(
                'type' => 'textarea',
                'section' => 'vantaggi_section',
                'label' => 'vantaggio 2 Description',
            ));

            $wp_customize->add_setting('front_page_vant_vant_3_title', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_vant_vant_3_title', array(
                'type' => 'textarea',
                'section' => 'vantaggi_section',
                'label' => 'vantaggio 3 Title',
            ));

            $wp_customize->add_setting('front_page_vant_vant_3_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_vant_vant_3_img', array(
                'label' => 'Vantaggio 3 Image',
                'section' => 'vantaggi_section',
                'settings' => 'front_page_vant_vant_3_img',
            )));
            
            $wp_customize->add_setting('front_page_vant_vant_3_description', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_vant_vant_3_description', array(
                'type' => 'textarea',
                'section' => 'vantaggi_section',
                'label' => 'vantaggio 3 Description',
            ));

            $wp_customize->add_setting('front_page_vant_cta', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_vant_cta', array(
                'type' => 'text',
                'section' => 'vantaggi_section',
                'label' => 'CTA text',
            ));


        $wp_customize->add_section(new WP_Customize_Section($wp_customize, 'recensioni_section', array(
            'title' => 'Recensioni Section',
            'priority' => 12, // Adjust the priority to position the nested section
            'panel' => 'front_page_panel', // Specify the parent section's ID
        )));

            $wp_customize->add_setting('front_page_rece_section_title', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_rece_section_title', array(
                'type' => 'text',
                'section' => 'recensioni_section',
                'label' => 'Section Title',
            ));

            $wp_customize->add_setting('front_page_rece_1_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_1_img', array(
                'label' => 'Recensione 1 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_1_img',
            )));

            $wp_customize->add_setting('front_page_rece_2_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_2_img', array(
                'label' => 'Recensione 2 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_2_img',
            )));

            $wp_customize->add_setting('front_page_rece_3_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_3_img', array(
                'label' => 'Recensione 3 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_3_img',
            )));

            $wp_customize->add_setting('front_page_rece_4_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_4_img', array(
                'label' => 'Recensione 4 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_4_img',
            )));

            $wp_customize->add_setting('front_page_rece_5_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_5_img', array(
                'label' => 'Recensione 5 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_5_img',
            )));

            $wp_customize->add_setting('front_page_rece_6_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_6_img', array(
                'label' => 'Recensione 6 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_6_img',
            )));

            $wp_customize->add_setting('front_page_rece_7_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_7_img', array(
                'label' => 'Recensione 7 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_7_img',
            )));

            $wp_customize->add_setting('front_page_rece_8_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_8_img', array(
                'label' => 'Recensione 8 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_8_img',
            )));

            $wp_customize->add_setting('front_page_rece_9_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'front_page_rece_9_img', array(
                'label' => 'Recensione 9 img',
                'section' => 'recensioni_section',
                'settings' => 'front_page_rece_9_img',
            )));




        $wp_customize->add_section(new WP_Customize_Section($wp_customize, 'faq_section', array(
            'title' => 'FAQ Section',
            'priority' => 11, // Adjust the priority to position the nested section
            'panel' => 'front_page_panel', // Specify the parent section's ID
        )));

            $wp_customize->add_setting('front_page_faq_section_title', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_faq_section_title', array(
                'type' => 'text',
                'section' => 'faq_section',
                'label' => 'Section Title',
            ));

            $wp_customize->add_setting('front_page_faq_q_1', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_faq_q_1', array(
                'type' => 'text',
                'section' => 'faq_section',
                'label' => 'Question 1',
            ));

            $wp_customize->add_setting('front_page_faq_a_1', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_faq_a_1', array(
                'type' => 'textarea',
                'section' => 'faq_section',
                'label' => 'Answer 1',
            ));

            $wp_customize->add_setting('front_page_faq_q_2', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_faq_q_2', array(
                'type' => 'text',
                'section' => 'faq_section',
                'label' => 'Question 2',
            ));

            $wp_customize->add_setting('front_page_faq_a_2', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_faq_a_2', array(
                'type' => 'textarea',
                'section' => 'faq_section',
                'label' => 'Answer 2',
            ));

            $wp_customize->add_setting('front_page_faq_q_3', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_faq_q_3', array(
                'type' => 'text',
                'section' => 'faq_section',
                'label' => 'Question 3',
            ));

            $wp_customize->add_setting('front_page_faq_a_3', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_faq_a_3', array(
                'type' => 'textarea',
                'section' => 'faq_section',
                'label' => 'Answer 3',
            ));

            $wp_customize->add_setting('front_page_faq_q_4', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_faq_q_4', array(
                'type' => 'text',
                'section' => 'faq_section',
                'label' => 'Question 4',
            ));

            $wp_customize->add_setting('front_page_faq_a_4', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_faq_a_4', array(
                'type' => 'textarea',
                'section' => 'faq_section',
                'label' => 'Answer 4',
            ));

            $wp_customize->add_setting('front_page_faq_q_5', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_faq_q_5', array(
                'type' => 'text',
                'section' => 'faq_section',
                'label' => 'Question 5',
            ));

            $wp_customize->add_setting('front_page_faq_a_5', array(
                'default' => '',
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_faq_a_5', array(
                'type' => 'textarea',
                'section' => 'faq_section',
                'label' => 'Answer 5',
            ));

            $wp_customize->add_setting('front_page_faq_cta_text', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('front_page_faq_cta_text', array(
                'type' => 'text',
                'section' => 'faq_section',
                'label' => 'CTA text',
            ));

            

    
}
add_action('customize_register', 'custom_theme_customizer_settings');
    
    
    

function get_alt($img_url){

    // Get the attachment ID for the image using its URL
    $attachment_id = attachment_url_to_postid( $img_url );
    // Get the alt text for the attachment
    $alt_text = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
   
    return $alt_text;

}

// Allow SVG file upload
function allow_svg_upload( $mime_types ) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );





