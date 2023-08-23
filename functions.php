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
    wp_enqueue_style('style', get_stylesheet_uri() , array(), $version, 'all');
    wp_enqueue_style('header-css', get_template_directory_uri() . '/assets/css/header.css', array('style'), $version, 'all');
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/assets/css/footer.css', array('style'), $version, 'all');
    if (!is_front_page()) {
        wp_enqueue_style('pages-style', get_template_directory_uri() . '/assets/css/page.css', array('style'), $version, 'all');
        if(is_page('Contatti')){
            wp_enqueue_style('contatti-style', get_template_directory_uri() . '/assets/css/contatti.css', array('style'), $version, 'all');
        }
        if(is_single()){
            wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/single.css', array('style'), $version, 'all');
        }
        if(is_home()){
            wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css', array('style'), $version, 'all');

        }
        if (is_archive()) {
            wp_enqueue_style('archive-style', get_template_directory_uri() . '/assets/css/archive.css', array('style'), $version, 'all');
        }
        if(is_page('Chi Siamo')){
            wp_enqueue_style('chi-siamo-style', get_template_directory_uri() . '/assets/css/chi-siamo.css', array('style'), $version, 'all');
        }
    }
    else{
        wp_enqueue_style('front-page-css', get_template_directory_uri() . '/assets/css/front-page.css', array('style'), $version, 'all');
    }
    


}
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_js() {
    
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script('jquery');
   
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $version, true);

    wp_enqueue_script('header-js', get_template_directory_uri() . '/assets/js/header.js', array('jquery'), $version, true);

    if(!is_front_page()){
        if(is_single()){
            wp_enqueue_script('single-js', get_template_directory_uri() . '/assets/js/single.js', array('jquery'), $version, true);
        }
    }
    else{
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

    $wp_customize->add_setting( 'large_desktop_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'large_desktop_logo', array(
        'label'    => 'Large Desktop Logo',
        'section'  => 'title_tagline',
        'settings' => 'large_desktop_logo',
        
    ) ) );

    // Mobile Logo
    $wp_customize->add_setting( 'mobile_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mobile_logo', array(
        'label'    => 'Mobile Logo',
        'section'  => 'title_tagline',
        'settings' => 'mobile_logo',
        
    ) ) );

    $wp_customize->add_setting( 'image_placeholder' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_placeholder', array(
        'label'    => 'Image Placeholder',
        'section'  => 'title_tagline',
        'settings' => 'image_placeholder',
        
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
                'sanitize_callback' => 'wp_kses_post',
            ));

            $wp_customize->add_control('front_page_h1', array(
                'type' => 'textarea',
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

        $wp_customize->add_panel('chi_siamo_panel', array(
            'title' => 'Chi Siamo Panel',
            'priority' => 2,
        ));
            $wp_customize->add_section(new WP_Customize_Section($wp_customize, 'hero_chi_siamo_section', array(
                'title' => 'Hero Section',
                'priority' => 11, // Adjust the priority to position the nested section
                'panel' => 'chi_siamo_panel', // Specify the parent section's ID
            )));
            $wp_customize->add_setting('chi_siamo_hero_mobile_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'chi_siamo_hero_mobile_img', array(
                'label' => 'Mobile Hero Image',
                'section' => 'hero_chi_siamo_section',
                'settings' => 'chi_siamo_hero_mobile_img',
            )));

            $wp_customize->add_setting('chi_siamo_hero_mobile_l_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'chi_siamo_hero_mobile_l_img', array(
                'label' => 'Mobile Large Hero Image',
                'section' => 'hero_chi_siamo_section',
                'settings' => 'chi_siamo_hero_mobile_l_img',
            )));

            $wp_customize->add_setting('chi_siamo_hero_tablet_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'chi_siamo_hero_tablet_img', array(
                'label' => 'Tablet Hero Image',
                'section' => 'hero_chi_siamo_section',
                'settings' => 'chi_siamo_hero_tablet_img',
            )));
            $wp_customize->add_setting('chi_siamo_hero_desktop_img', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
        
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'chi_siamo_hero_desktop_img', array(
                'label' => 'Desktop Hero Image',
                'section' => 'hero_chi_siamo_section',
                'settings' => 'chi_siamo_hero_desktop_img',
            )));
         
            $wp_customize->add_setting('sede_op', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('sede_op', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'Sede Operativa',
            ));

            $wp_customize->add_setting('p_iva', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('p_iva', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'P. I. text ',
            ));

            $wp_customize->add_setting('telefono_nr', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('telefono_nr', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'Nr Telefofono ',
            ));
            
            $wp_customize->add_setting('email', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('email', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'Email ',
            ));

            $wp_customize->add_setting('ig_link', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('ig_link', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'IG Link ',
            ));

            $wp_customize->add_setting('fb_link', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('fb_link', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'FB Link ',
            ));

            $wp_customize->add_setting('yt_link', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('yt_link', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'YT Link ',
            ));

            $wp_customize->add_setting('ld_link', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('ld_link', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'LD Link ',
            ));

            $wp_customize->add_setting('about', array(
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('about', array(
                'type' => 'text',
                'section' => 'title_tagline',
                'label' => 'About Company max(200char)',
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



// Hide the admin bar for all users
add_filter('show_admin_bar', '__return_false');


function custom_picture_shortcode() {
    $desktop_hero_img_url = get_theme_mod('chi_siamo_hero_desktop_img', '');
    $tablet_hero_img_url = get_theme_mod('chi_siamo_hero_tablet_img', '');
    $mobile_l_hero_img_url = get_theme_mod('chi_siamo_hero_mobile_l_img', '');
    $mobile_hero_img_url = get_theme_mod('chi_siamo_hero_mobile_img', '');
    $hero_img_alt = 'Chi siamo hero immagine';

    ob_start(); // Start output buffering

    // Output the <picture> element with dynamic image URLs
    ?>
    <div class="img-container">
        <picture>
            <source media="(max-width: 424px)" srcset="<?php echo esc_url($mobile_hero_img_url); ?>" width="376" height="376">
            <source media="(min-width: 425px) and (max-width: 649px)" srcset="<?php echo esc_url($mobile_l_hero_img_url); ?>" width="426" height="360">
            <source media="(min-width: 650px) and (max-width: 991px)" srcset="<?php echo esc_url($tablet_hero_img_url); ?>" width="350" height="350">
            <source media="(min-width: 992px)  and (max-width: 1199px)" srcset="<?php echo esc_url($desktop_hero_img_url); ?>" width="536" height="402">
            <source media="(min-width: 1200px)" srcset="<?php echo esc_url($desktop_hero_img_url); ?>" width="584" height="438">
            <img src="<?php echo esc_url($tablet_hero_img_url); ?>" alt="<?php echo esc_attr($hero_img_alt); ?>">
        </picture>
    </div>
    <?php

    return ob_get_clean(); // Return the buffered output
}
add_shortcode('custom_picture', 'custom_picture_shortcode');


// Disable automatic character replacement in WordPress text controls


