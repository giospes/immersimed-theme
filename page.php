<?php
    get_header()
?>
<main >
    <?php
        if(have_posts()){
            while ( have_posts()){
                the_post();
                if (!is_page('Chi Siamo')) {
                    
                    get_template_part('template-parts/content', 'page');
                } 
                else{
                    get_template_part('template-parts/content', 'chi-siamo');
                }
            }

        }
    ?>
</main>

<?php
    get_footer()
?>


 