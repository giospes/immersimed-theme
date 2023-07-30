<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
        wp_head();
    ?>
</head>
<body>
 
    <header>
        <h1 class="text-center"><?php the_title(); ?></h1>
        <nav class="navbar">
           
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <?php 
                    $mobile_logo_url = get_theme_mod( 'mobile_logo' ); 
                    $desktop_logo_url = get_theme_mod( 'desktop_logo' ); 


                    // Get the attachment ID for the image using its URL
                    $mobile_attachment_id = attachment_url_to_postid( $mobile_logo_url );
                    $desktop_attachment_id = attachment_url_to_postid( $desktop_logo_url );


                    // Get the alt text for the attachment
                    $mobile_alt_text = get_post_meta( $mobile_attachment_id, '_wp_attachment_image_alt', true );
                    $desktop_alt_text = get_post_meta( $desktop_attachment_id, '_wp_attachment_image_alt', true );
                ?>             
             
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo esc_url( $mobile_logo_url );  ?>" width="110" alt="<?php echo esc_attr($mobile_alt_text ); ?>">
                    <img src="<?php echo esc_url( $desktop_logo_url ); ?>"  width="345" alt="<?php echo esc_attr( $desktop_alt_text); ?>">
                </picture>
                

                <!-- Fallback for browsers that don't support the <picture> element -->
                <noscript>
                    <img src="<?php echo esc_url( $desktop_logo_url ); ?>" >
                </noscript>
            </a>
            <a href="">
                <?php echo get_bloginfo('name'); ?>
            </a>
            <?php 
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary', 
                        'items_wrap' => '<ul id="" class="">%3$s</ul>'

                    )
                )
            ?>

        <?php 
            dynamic_sidebar('sidebar-1')       
        ?>

        </nav>
    </header>
