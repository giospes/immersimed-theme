<?php session_start();?>
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

    <header  >
        <nav class="gs-navbar ">
           
            <a class="gs-navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <?php 
                    
                    $mobile_logo_url = get_theme_mod( 'mobile_logo' ); 
                    $desktop_logo_url = get_theme_mod( 'desktop_logo' ); 
                    $_SESSION['mobile_logo_url'] = $mobile_logo_url;
                    $_SESSION['desktop_logo_url'] = $desktop_logo_url;



                    // Get the alt text for the attachment
                    $mobile_alt_text = get_alt($mobile_logo_url);
                    $desktop_alt_text = get_alt($desktop_logo_url);
                    $_SESSION['mobile_alt_text'] = $mobile_alt_text;
                    $_SESSION['desktop_alt_text'] = $desktop_alt_text;
                ?>             
             
                <picture >
                    <source media="(max-width: 400px)" srcset="<?php echo esc_url( $mobile_logo_url );  ?>" width="90" height="38"  id="mobile-logo-img">
                    <source media="(max-width: 550px)" srcset="<?php echo esc_url( $mobile_logo_url );  ?>" width="136" height="58"   id="mobile-logo-img">
                    <img  id="desktop-logo-img" src="<?php echo esc_url( $desktop_logo_url ); ?>"  width="345"  alt="Logo Immersimed">
                </picture>
                

                <!-- Fallback for browsers that don't support the <picture> element -->
                <noscript>
                    <img src="<?php echo esc_url( $desktop_logo_url ); ?>" >
                </noscript>
            </a>

          
            <div class="header-buttons">
                
                <div class="gs-navbar-menu" id="navbarNav1">
                    
                        <?php 
                            wp_nav_menu(
                                array(
                                    'menu' => 'primary',
                                    'container' => '',
                                    'theme_location' => 'primary', 
                                    'items_wrap' => '<ul>%3$s</ul>'
                                )
                            )
                        ?>
                    
                </div>
                <a href="" id="nav-cta" type="button">Scopri di più</a>
                <button class="gs-navbar-toggler " type="button"  id="menuToggle" aria-label="Toggle navigation">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="25"
                        height="25"
                        viewBox="0 0 25 25"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        >
                        <line x1="5" y1="23.5" x2="20" y2="23.5" />
                        <line x1="1.5" y1="12.5" x2="23.5" y2="12.5" />
                        <line x1="5" y1="1.5" x2="20" y2="1.5" />
                    </svg>

                </button>
            </div>

        </nav>
    </header>
    
  
