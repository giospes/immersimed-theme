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
<main class="wrapper">
    
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
    <?php
        $van_section_title = get_theme_mod('front_page_vant_section_title', '');
        $van_1_title = get_theme_mod('front_page_vant_vant_1_title', '');
        $van_1_description = get_theme_mod('front_page_vant_vant_1_description', '');
        $van_1_url = get_theme_mod('front_page_vant_vant_1_img', '');
        $van_1_alt = get_alt($van_1_url);
    ?>
    <section class="vantaggi">
        <h2><?php echo wp_kses_post($van_section_title); ?></h2>
        <div class="vantaggio">
            <div class="content">
            <h3>Esplora il corpo umano</h3>
                <div class="mobile-img-container">
                    <img src="" alt="">
                </div>
                <p>I visori che forniamo ti permettono di entrare in organi e apparti per osservarne il funzionamento</p>
            </div>
           
            <div class="desktop-img-container">
                <img src="" alt="">
            </div>

        </div>
        
    </section>
    
    
</main>

<?php
    get_footer()
?>