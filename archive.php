<?php
    get_header()
?>
<main>
    <h1 class="text-center">Post <?php single_cat_title(); ?></h1>   
    <p class="pg-wrapper">Qui sono presenti tutti i post della categoria: <strong><?php single_cat_title(); ?></strong></p>

    <article class="pg-wrapper pg-flex wrap pg-justify-content-center" >
        <?php
            if(have_posts()){
                while ( have_posts()){
                    the_post();
                    get_template_part('template-parts/content', 'archive');
                }
            }
        ?>
    </article>
</main>

<?php
    get_footer()
?>