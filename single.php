<?php
    get_header()
?>
<main class="pg-wrapper">
    <article>
        <?php
            if(have_posts()){
                while ( have_posts()){
                    the_post();
                    get_template_part('template-parts/content', 'article');
                }
            }
        ?>
    </article>
</main>

<?php
    get_footer()
?>