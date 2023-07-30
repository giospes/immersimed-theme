<?php

function theme_support(){
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
    add_theme_support( 'customizer' );
}
add_action('after_setup_theme', 'theme_support');

function menus() {
    $location = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' =>"Footer Menu Items"
    );

    register_nav_menus($location);
}
add_action('init', 'menus');

function enqueue_style() {
    $version = wp_get_theme()->get('Version');

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css', array(), '5.3.0', 'all');

    // nel caso sposti il style.css cambia in get_template e il path
    // Enqueue Custom CSS (style.css)
    wp_enqueue_style('style', get_stylesheet_uri(), array('bootstrap'), $version, 'all');

}
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_js() {
    // Enqueue Bootstrap JS
    $version = wp_get_theme()->get('Version');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js', array(''), '3.7.0', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '5.3.0', true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/node_modules/@popperjs/core/dist/umd/popper.min.js', array('jquery'), '2.11.8', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $version, true);

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


function logo_customizer( $wp_customize ) {
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

    
    
}
add_action( 'customize_register', 'logo_customizer' );

// Allow SVG file upload
function allow_svg_upload( $mime_types ) {
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );





