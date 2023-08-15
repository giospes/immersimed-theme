<?php
    get_header()
?>
<main class="pg-wrapper">
    <h1 class="text-center">Tutti i Post</h1>
    <article class="pg-flex wrap" >
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