<?php
    get_header();
    $h1_text = get_theme_mod('front_page_h1', '');
    $desktop_hero_img_url = get_theme_mod('front_page_hero_desktop_image', '');
    $mobile_hero_img_url = get_theme_mod('front_page_hero_mobile_image', '');
    $tablet_hero_img_url = get_theme_mod('front_page_hero_tablet_image', '');
    $hero_text = get_theme_mod('front_page_hero_text', '');
    $hero_cta_text = get_theme_mod('front_page_hero_cta', '');
    $hero_social_proof = get_theme_mod('front_page_hero_social_proof', '');
    $hero_social_proof_img_1 = get_theme_mod('front_page_hero_soc_proof_img_1', '');
    $hero_social_proof_img_1_alt= get_alt($hero_social_proof_img_1);
    $hero_social_proof_img_2 = get_theme_mod('front_page_hero_soc_proof_img_2', '');
    $hero_social_proof_img_2_alt= get_alt($hero_social_proof_img_2);
    $hero_social_proof_img_3 = get_theme_mod('front_page_hero_soc_proof_img_3', '');
    $hero_social_proof_img_3_alt= get_alt($hero_social_proof_img_3);
    $sponsor_1_url= get_theme_mod( 'front_page_under_hero_image_1', ''); 
    $sponsor_1_alt = get_alt($sponsor_1_url);
    $sponsor_3_url= get_theme_mod( 'front_page_under_hero_image_3', ''); 
    $sponsor_3_alt = get_alt($sponsor_3_url);
    $sponsor_2_url= get_theme_mod( 'front_page_under_hero_image_2', ''); 
    $sponsor_2_alt = get_alt($sponsor_2_url);
?>
<main>
    <div class="wrapper">
        <section class="hero ">
            <div class="left-side">
                <h1><?php echo wp_kses_post($h1_text) ?></h1>

                    <div class=" mobile-image-container">
                    
                        <picture>
                            <!-- Mobile Image -->
                            <source media="(max-width: 650px)" srcset="<?php echo esc_url($mobile_hero_img_url); ?>" width="300" height="180" >
                            <!-- Tablet Image -->
                            <source media="(max-width: 991px)" srcset="<?php echo esc_url($tablet_hero_img_url); ?>"  >
                            

                            <!-- Fallback Image for browsers that don't support <picture> -->
                            <img src="<?php echo esc_url($tablet_hero_img_url); ?>" alt="Hero main Image - Ragazzo di medicina con visore e un cuore 3d" width="500" height="300">
                        </picture>
                  
                    </div>

                
                <p><?php echo wp_kses_post($hero_text); ?></p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_title( 'Contatti' ) ) ); ?>" class="cta-button" aria-label="Corso TOLC-Med - Ricevi una consulenza gratuita"><?php echo  wp_kses_post($hero_cta_text); ?></a>
                <figure id="hero-social-proof">
                    <div class="circle-container-wrapper" >
                        <div class="circle-img-container">
                            <img  src="<?php echo esc_url($hero_social_proof_img_1); ?>" alt="<?php echo esc_url($hero_social_proof_img_1_alt); ?>" loading="lazy">
                        </div> 
                        <div class="circle-img-container">
                            <img  src="<?php echo esc_url($hero_social_proof_img_1); ?>" alt="<?php echo esc_url($hero_social_proof_img_2_alt); ?>" loading="lazy">
                        </div>  
                        <div class="circle-img-container">
                            <img src="<?php echo esc_url($hero_social_proof_img_1); ?>" alt="<?php echo esc_url($hero_social_proof_img_3_alt); ?>" loading="lazy"v>
                        </div> 
                    </div>
                    <figcaption><?php echo wp_kses_post($hero_social_proof); ?> </figcaption>
                </figure>
            </div>
            <?php
            // Get the window width using JavaScript and pass it to PHP
                $window_width = '<script type="text/javascript">document.write(window.innerWidth);</script>';
            ?>
            <div class="right-side">
                <img src="<?php echo esc_url($desktop_hero_img_url); ?>" alt="Hero main Image - Ragazzo di medicina con visore e un cuore 3d">
            </div>  
          
    
        </section>
        <div class="under-hero">
            <div class="content">
                <span>Parlano di noi</span>
                <figure>
                    <img src="<?php echo esc_url( $sponsor_1_url ); ?>" alt="<?php echo esc_attr( $sponsor_1_url ); ?>" width="150px" loading="lazy">
                    <img src="<?php echo esc_url( $sponsor_2_url ); ?>" alt="<?php echo esc_attr( $sponsor_2_url ); ?>" width="150px" loading="lazy">
                    <img src="<?php echo esc_url( $sponsor_3_url ); ?>" alt="<?php echo esc_attr( $sponsor_3_url ); ?>" width="150px" loading="lazy">
                </figure>
            </div> 
        </div>
    </div>
    
    <?php
        $per_title = get_theme_mod('front_page_per_title', '');
        $per_description = get_theme_mod('front_page_per_description', '');
        $per_card_1_url = get_theme_mod('front_page_per_card_1_img', '');
        $per_card_1_alt = get_alt($per_card_1_url);
        $per_card_2_url = get_theme_mod('front_page_per_card_2_img', '');
        $per_card_2_alt = get_alt($per_card_2_url);
        $per_card_3_url = get_theme_mod('front_page_per_card_3_img', '');
        $per_card_3_alt = get_alt($per_card_3_url);
        $per_card_1_text = get_theme_mod('front_page_per_card_1_text', '');
        $per_card_2_text = get_theme_mod('front_page_per_card_2_text', '');
        $per_card_3_text = get_theme_mod('front_page_per_card_3_text', '');
    ?>
    <div class="wrapper">
        <section class="per-immersimed">
            <div class="text-container">
                <h2><?php echo wp_kses_post($per_title); ?></h2> 
                <p><?php echo wp_kses_post($per_description); ?></p>
            </div>
            <div class="card-container">
                <div class="card">
                    <div class="card-head">
                        <img src="<?php echo esc_url($per_card_1_url); ?>" alt="<?php echo esc_attr($per_card_1_alt); ?>" height="150" loading="lazy">
                    </div>
                    <p class="card-body"><?php echo wp_kses_post($per_card_1_text); ?></p>
                </div>
                <div class="card shifted">
                    <div class="card-head ">
                        <img src="<?php echo esc_url($per_card_2_url); ?>" alt="<?php echo esc_attr($per_card_2_alt); ?>" height="150" loading="lazy">
                    </div>
                    <p class="card-body"><?php echo wp_kses_post($per_card_2_text); ?></p>
                </div>
                <div class="card">
                    <div class="card-head">
                        <img src="<?php echo esc_url($per_card_3_url); ?>" alt="<?php echo esc_attr($per_card_3_alt); ?>" height="150" loading="lazy">
                    </div>
                    <p class="card-body"><?php echo wp_kses_post($per_card_3_text); ?></p>
                </div>
            </div>
        </section>
    </div>
    <?php
        $van_section_title = get_theme_mod('front_page_vant_section_title', '');
        $van_1_title = get_theme_mod('front_page_vant_vant_1_title', '');
        $van_1_description = get_theme_mod('front_page_vant_vant_1_description', '');
        $van_1_url = get_theme_mod('front_page_vant_vant_1_img', '');
        $van_1_alt = get_alt($van_1_url);
        $van_2_title = get_theme_mod('front_page_vant_vant_2_title', '');
        $van_2_description = get_theme_mod('front_page_vant_vant_2_description', '');
        $van_2_url = get_theme_mod('front_page_vant_vant_2_img', '');
        $van_2_alt = get_alt($van_2_url);
        $van_3_title = get_theme_mod('front_page_vant_vant_3_title', '');
        $van_3_description = get_theme_mod('front_page_vant_vant_3_description', '');
        $van_3_url = get_theme_mod('front_page_vant_vant_3_img', '');
        $van_3_alt = get_alt($van_3_url);
        $van_cta_text = get_theme_mod('front_page_vant_cta')
    ?>
    <section class="vantaggi">
        <div class="wrapper">
            <h2><?php echo wp_kses_post($van_section_title); ?></h2> 
            <div class="vantaggio">
                <div class="vt-image-container vt-desktop">
                    <img src="<?php echo esc_url($van_1_url); ?>" alt="<?php echo esc_attr($van_1_alt); ?>" width='350' height='350'>
                </div>
                <div class="content">
                    <h3><?php echo wp_kses_post($van_1_title); ?></h3>
                    <div  class="vt-image-container vt-mobile">
                        <img src="<?php echo esc_url($van_1_url); ?>" alt="<?php echo esc_attr($van_1_alt); ?>" width='300' height='300'>
                    </div>
                    <p><?php echo wp_kses_post($van_1_description); ?></p>
                </div>
            </div>
            <div class="vantaggio">
                <div class="vt-image-container vt-desktop">
                    <img src="<?php echo esc_url($van_2_url); ?>" alt="<?php echo esc_attr($van_2_alt); ?>" loading="lazy">
                </div>
                <div class="content">
                    <h3><?php echo wp_kses_post($van_2_title); ?></h3>
                    <div  class="vt-image-container vt-mobile">
                        <img src="<?php echo esc_url($van_2_url); ?>" alt="<?php echo esc_attr($van_2_alt); ?>" loading="lazy" >
                    </div>
                    <p><?php echo wp_kses_post($van_2_description); ?></p>
                </div>
            </div>
            <div class="vantaggio">
                <div class="vt-image-container vt-desktop">
                    <img src="<?php echo esc_url($van_3_url); ?>" alt="<?php echo esc_attr($van_3_alt); ?>" loading="lazy">
                </div>
                <div class="content">
                    <h3><?php echo wp_kses_post($van_3_title); ?></h3>
                    <div  class="vt-image-container vt-mobile">
                        <img src="<?php echo esc_url($van_3_url); ?>" alt="<?php echo esc_attr($van_3_alt); ?>" loading="lazy">
                    </div>
                    <p><?php echo wp_kses_post($van_3_description); ?></p>
                </div>
            </div>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contatti' ) ) ); ?>" class="big-cta-button" aria-label="Corso TOLC-Med - Ricevi una consulenza gratuita"><?php echo  esc_attr($van_cta_text); ?></a>
        </div>
    </section>
    <?php
        $rece_section_title = get_theme_mod('front_page_rece_section_title', '');
        $rece_1_img_url = get_theme_mod('front_page_rece_1_img');
        $rece_1_img_alt = get_alt($rece_1_img_url);
        $rece_2_img_url = get_theme_mod('front_page_rece_2_img');
        $rece_2_img_alt = get_alt($rece_2_img_url);
        $rece_3_img_url = get_theme_mod('front_page_rece_3_img');
        $rece_3_img_alt = get_alt($rece_3_img_url);
        $rece_4_img_url = get_theme_mod('front_page_rece_4_img');
        $rece_4_img_alt = get_alt($rece_4_img_url);
        $rece_5_img_url = get_theme_mod('front_page_rece_5_img');
        $rece_5_img_alt = get_alt($rece_5_img_url);
        $rece_6_img_url = get_theme_mod('front_page_rece_6_img');
        $rece_6_img_alt = get_alt($rece_6_img_url);
        $rece_7_img_url = get_theme_mod('front_page_rece_7_img');
        $rece_7_img_alt = get_alt($rece_7_img_url);
        $rece_8_img_url = get_theme_mod('front_page_rece_8_img');
        $rece_8_img_alt = get_alt($rece_8_img_url);
        $rece_9_img_url = get_theme_mod('front_page_rece_9_img');
        $rece_9_img_alt = get_alt($rece_9_img_url);
    ?>
    <section class="recensioni">
        <div class="wrapper">
            <h2><?php echo esc_html($rece_section_title) ?></h2>
            <div class="recensioni-container">
                <div class="faders">
                    <div class="left"></div>
                    <div class="right"></div>
                </div> 
                <div class="recensioni-cards">
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_1_img_url); ?>" alt="<?php echo esc_attr($rece_1_img_alt); ?> " loading="lazy" width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_2_img_url); ?>" alt="<?php echo esc_attr($rece_2_img_alt); ?>" loading="lazy"  width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_3_img_url); ?>" alt="<?php echo esc_attr($rece_3_img_alt); ?>" loading="lazy"  width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_4_img_url); ?>" alt="<?php echo esc_attr($rece_4_img_alt); ?>" loading="lazy" width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_5_img_url); ?>" alt="<?php echo esc_attr($rece_5_img_alt); ?>" loading="lazy" width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_6_img_url); ?>" alt="<?php echo esc_attr($rece_6_img_alt); ?>" loading="lazy" width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_7_img_url); ?>" alt="<?php echo esc_attr($rece_7_img_alt); ?>" loading="lazy" width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_8_img_url); ?>" alt="<?php echo esc_attr($rece_8_img_alt); ?>" loading="lazy" width="250" height="375">
                    </div>
                    <div class="entry">
                        <img src="<?php echo esc_url($rece_9_img_url); ?>" alt="<?php echo esc_attr($rece_9_img_alt); ?>" loading="lazy" width="250" height="375">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        $faq_section_title = get_theme_mod('front_page_faq_section_title', '');
        $faq_q_1 = get_theme_mod('front_page_faq_q_1', '');
        $faq_a_1 = get_theme_mod('front_page_faq_a_1', '');
        $faq_q_2 = get_theme_mod('front_page_faq_q_2', '');
        $faq_a_2 = get_theme_mod('front_page_faq_a_2', '');
        $faq_q_3 = get_theme_mod('front_page_faq_q_3', '');
        $faq_a_3 = get_theme_mod('front_page_faq_a_3', '');
        $faq_q_4 = get_theme_mod('front_page_faq_q_4', '');
        $faq_a_4 = get_theme_mod('front_page_faq_a_4', '');
        $faq_q_5 = get_theme_mod('front_page_faq_q_5', '');
        $faq_a_5 = get_theme_mod('front_page_faq_a_5', '');
        $faq_cta_text = get_theme_mod('front_page_faq_cta_text', '');
    ?>
    <section class="faq "> 
        <div class="wrapper">
            <h2><?php echo esc_html($faq_section_title) ?></h2>
            <ul class="accordion">
                <li class="accordion-item">
                    <div class="accordion-header"><?php echo esc_html($faq_q_1) ?> <span><svg width="68px" height="68px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.12000000000000002"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ffffff" stroke-width="0.24000000000000005"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.79289 6.29289C9.18342 5.90237 9.81658 5.90237 10.2071 6.29289L15.2071 11.2929C15.5976 11.6834 15.5976 12.3166 15.2071 12.7071L10.2071 17.7071C9.81658 18.0976 9.18342 18.0976 8.79289 17.7071C8.40237 17.3166 8.40237 16.6834 8.79289 16.2929L13.0858 12L8.79289 7.70711C8.40237 7.31658 8.40237 6.68342 8.79289 6.29289Z" fill="#ffffff"></path> </g></svg></span> </div>
                    <div class="accordion-content">
                        <hr>
                        <p><?php echo esc_textarea($faq_a_1) ?> </p>
                    </div>
                </li>
                <li class="accordion-item">
                    <button class="accordion-header"><?php echo esc_html($faq_q_2) ?> <span><svg width="68px" height="68px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.12000000000000002"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ffffff" stroke-width="0.24000000000000005"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.79289 6.29289C9.18342 5.90237 9.81658 5.90237 10.2071 6.29289L15.2071 11.2929C15.5976 11.6834 15.5976 12.3166 15.2071 12.7071L10.2071 17.7071C9.81658 18.0976 9.18342 18.0976 8.79289 17.7071C8.40237 17.3166 8.40237 16.6834 8.79289 16.2929L13.0858 12L8.79289 7.70711C8.40237 7.31658 8.40237 6.68342 8.79289 6.29289Z" fill="#ffffff"></path> </g></svg></span></button>
                    <div class="accordion-content">
                        <hr>
                        <p><?php echo esc_textarea($faq_a_2) ?></p>
                    </div>
                </li>
                <li class="accordion-item">
                    <button class="accordion-header"><?php echo esc_html($faq_q_3) ?> <span><svg width="68px" height="68px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.12000000000000002"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ffffff" stroke-width="0.24000000000000005"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.79289 6.29289C9.18342 5.90237 9.81658 5.90237 10.2071 6.29289L15.2071 11.2929C15.5976 11.6834 15.5976 12.3166 15.2071 12.7071L10.2071 17.7071C9.81658 18.0976 9.18342 18.0976 8.79289 17.7071C8.40237 17.3166 8.40237 16.6834 8.79289 16.2929L13.0858 12L8.79289 7.70711C8.40237 7.31658 8.40237 6.68342 8.79289 6.29289Z" fill="#ffffff"></path> </g></svg></span></button>
                    <div class="accordion-content">
                        <hr>
                        <p><?php echo esc_textarea($faq_a_3) ?></p>
                    </div>
                </li>
                <li class="accordion-item">
                    <button class="accordion-header"><?php echo esc_html($faq_q_4) ?><span><svg width="68px" height="68px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.12000000000000002"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ffffff" stroke-width="0.24000000000000005"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.79289 6.29289C9.18342 5.90237 9.81658 5.90237 10.2071 6.29289L15.2071 11.2929C15.5976 11.6834 15.5976 12.3166 15.2071 12.7071L10.2071 17.7071C9.81658 18.0976 9.18342 18.0976 8.79289 17.7071C8.40237 17.3166 8.40237 16.6834 8.79289 16.2929L13.0858 12L8.79289 7.70711C8.40237 7.31658 8.40237 6.68342 8.79289 6.29289Z" fill="#ffffff"></path> </g></svg></span></button>
                    <div class="accordion-content">
                        <hr>
                        <p><?php echo esc_textarea($faq_a_4) ?></p>
                    </div>
                </li>
                <li class="accordion-item">
                    <button class="accordion-header"><?php echo esc_html($faq_q_5) ?><span><svg width="68px" height="68px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.12000000000000002"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#ffffff" stroke-width="0.24000000000000005"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M8.79289 6.29289C9.18342 5.90237 9.81658 5.90237 10.2071 6.29289L15.2071 11.2929C15.5976 11.6834 15.5976 12.3166 15.2071 12.7071L10.2071 17.7071C9.81658 18.0976 9.18342 18.0976 8.79289 17.7071C8.40237 17.3166 8.40237 16.6834 8.79289 16.2929L13.0858 12L8.79289 7.70711C8.40237 7.31658 8.40237 6.68342 8.79289 6.29289Z" fill="#ffffff"></path> </g></svg></span></button>
                    <div class="accordion-content">
                        <hr>
                        <p><?php echo esc_textarea($faq_a_5)?></p>
                    </div>
                </li>
            </ul>
            <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contatti' ) ) ); ?>" class="big-cta-button" aria-label="TOLC-Med - Ricevi una consulenza gratuita"><?php echo  esc_attr($faq_cta_text); ?></a>
        </div>
    </section>

    
    
</main>

<?php
    get_footer()
?>