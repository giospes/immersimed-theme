<?php
    get_header();
    $h1_text = get_theme_mod('front_page_h1', '');
    $desktop_hero_img_url = get_theme_mod('front_page_hero_desktop_image', '');
    $mobile_hero_img_url = get_theme_mod('front_page_hero_mobile_image', '');
    $hero_text = get_theme_mod('front_page_hero_text', '');
    $hero_cta_text = get_theme_mod('front_page_hero_cta', '');
    $hero_social_proof = get_theme_mod('front_page_hero_social_proof', '');
    $desktop_logo_url = get_theme_mod( 'desktop_logo' ); 

?>
<main>
    <div class="wrapper">
        <section class="hero ">
        
            <h1><?php echo esc_html($h1_text); ?></h1>
            <?php if ($desktop_hero_img_url || $desktop_hero_img_url) : ?>
                <div class="image-container">
                    <picture>
                        <!-- Mobile Image -->
                        <source media="(max-width: 992px)" srcset="<?php echo esc_url($mobile_hero_img_url); ?>">
                        
                        <!-- Desktop Image -->
                        <source media="(min-width: 992px)" srcset="<?php echo esc_url($desktop_hero_img_url); ?>">

                        <!-- Fallback Image for browsers that don't support <picture> -->
                        <img src="<?php echo esc_url($desktop_img_url); ?>" alt="Hero main Image - Ragazzo di medicina con visore e un cuore 3d">
                    </picture>
                </div>
            <?php endif; ?>
            
            <p><?php echo wp_kses_post($hero_text); ?></p>
            <a href="#" class="cta-button"><?php echo  wp_kses_post($hero_cta_text); ?></a>
            <figure id="hero-social-proof">
                <div class="circle-container-wrapper" >
                    <div class="circle-img-container">
                        <img  src="<?php echo get_template_directory_uri() . '/assets/images/white.png' ?>" alt="Vincenzo Vitale Foto">
                    </div> 
                    <div class="circle-img-container">
                        <img  src="<?php echo  get_template_directory_uri() . '/assets/images/white.png' ?>" alt="Vincenzo Vitale Foto">
                    </div>  
                    <div class="circle-img-container">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/white.png' ?>" alt="Vincenzo Vitale Foto">
                    </div> 
                </div>
                <figcaption><?php echo wp_kses_post($hero_social_proof); ?> </figcaption>
            </figure>
            
            
            
        </section>
        <div class="under-hero">
            <div class="content">
                <span>Parlano di noi</span>
                <figure>
                    <img src="<?php echo esc_url( $desktop_logo_url ); ?>" alt="" width="150px">
                    <img src="<?php echo esc_url( $desktop_logo_url ); ?>" alt="" width="150px">
                    <img src="<?php echo esc_url( $desktop_logo_url ); ?>" alt="" width="150px">
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
                        <img src="<?php echo esc_url($per_card_1_url); ?>" alt="<?php echo esc_attr($per_card_1_alt); ?>" width="300">
                    </div>
                    <p class="card-body"><?php echo wp_kses_post($per_card_1_text); ?></p>
                </div>
                <div class="card shifted">
                    <div class="card-head ">
                        <img src="<?php echo esc_url($per_card_2_url); ?>" alt="<?php echo esc_attr($per_card_2_alt); ?>" width="300">
                    </div>
                    <p class="card-body"><?php echo wp_kses_post($per_card_2_text); ?></p>
                </div>
                <div class="card">
                    <div class="card-head">
                        <img src="<?php echo esc_url($per_card_3_url); ?>" alt="<?php echo esc_attr($per_card_3_alt); ?>" width="300">
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
                    <img src="<?php echo esc_url($van_1_url); ?>" alt="<?php echo esc_attr($van_1_alt); ?>">
                </div>
                <div class="content">
                    <h3><?php echo wp_kses_post($van_1_title); ?></h3>
                    <div  class="vt-image-container vt-mobile">
                        <img src="<?php echo esc_url($van_1_url); ?>" alt="<?php echo esc_attr($van_1_alt); ?>" >
                    </div>
                    <p><?php echo wp_kses_post($van_1_description); ?></p>
                </div>
            </div>
            <div class="vantaggio">
                <div class="vt-image-container vt-desktop">
                    <img src="<?php echo esc_url($van_2_url); ?>" alt="<?php echo esc_attr($van_2_alt); ?>">
                </div>
                <div class="content">
                    <h3><?php echo wp_kses_post($van_2_title); ?></h3>
                    <div  class="vt-image-container vt-mobile">
                        <img src="<?php echo esc_url($van_2_url); ?>" alt="<?php echo esc_attr($van_2_alt); ?>" >
                    </div>
                    <p><?php echo wp_kses_post($van_2_description); ?></p>
                </div>
            </div>
            <div class="vantaggio">
                <div class="vt-image-container vt-desktop">
                    <img src="<?php echo esc_url($van_3_url); ?>" alt="<?php echo esc_attr($van_3_alt); ?>">
                </div>
                <div class="content">
                    <h3><?php echo wp_kses_post($van_3_title); ?></h3>
                    <div  class="vt-image-container vt-mobile">
                        <img src="<?php echo esc_url($van_3_url); ?>" alt="<?php echo esc_attr($van_3_alt); ?>" >
                    </div>
                    <p><?php echo wp_kses_post($van_3_description); ?></p>
                </div>
            </div>
            <a href="#" class="big-cta-button"><?php echo  esc_attr($van_cta_text); ?></a>
        </div>
    </section>
    <section class="recensioni">
   
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
    <section class="faq wrapper"> 
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
        <a href="#" class="big-cta-button"><?php echo  esc_attr($faq_cta_text); ?></a>
    </section>

    
    
</main>

<?php
    get_footer()
?>