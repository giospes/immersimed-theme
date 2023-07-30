<?php
    get_header()
?>
<main>
    <article>
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