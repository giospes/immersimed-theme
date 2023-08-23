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

    <header id="fixed-header" >
        <nav class="gs-navbar ">
           
            <a class="gs-navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <?php              
                    $mobile_logo_url = get_theme_mod( 'mobile_logo' ); 
                    $desktop_logo_url = get_theme_mod( 'desktop_logo' ); 
                    $large_desktop_logo_url = get_theme_mod( 'large_desktop_logo' );
                    $logo_alt= "Logo Immersimed - Un visore con la scritta Immersimed";
                    $_SESSION['mobile_logo_url'] = $mobile_logo_url;
                    $_SESSION['desktop_logo_url'] = $desktop_logo_url;
                    $_SESSION['large_desktop_logo_url'] = $large_desktop_logo_url;

                ?>             
             
                <picture >
                    <source media="(max-width: 550px)" srcset="<?php echo esc_url( $mobile_logo_url );  ?>" width="90" height="38" >  
                    <source class="desktop-logo-img" media="(max-width: 1200px)" srcset="<?php echo esc_url( $desktop_logo_url ); ?>"   width="250" height="42.03">
                    <img  class="desktop-logo-img" src="<?php echo esc_url( $large_desktop_logo_url ); ?>"  width="345" height="58" alt=<?php echo $logo_alt ?>>
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
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contatti' ) ) ); ?>" id="nav-cta" type="button" aria-label="Corso TOLC-Med - Ricevi una consulenza gratuita">Scopri di più</a>
                <button class="gs-navbar-toggler " type="button"  id="menuToggle" aria-label="Toggle navigation">
                    <svg class="icon open"
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
                    <svg class="icon close" width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19 5L4.99998 19M5.00001 5L19 19" stroke="#3e5555" stroke-width="2.0" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>

                </button>
            </div>

        </nav>
    </header>
    
  
