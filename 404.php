<?php get_header(); ?>

<main>
    <h1>Page not Found</h1>
    <?php 
        get_search_form();
    ?>
    <?php
    $args = array(
        'post_type'      => 'post',   // Fetch only posts
        'posts_per_page' => 5,        // Show 5 latest posts
        'orderby'        => 'date',   // Order by date (newest first)
        
    );

    $latest_posts_query = new WP_Query($args);
    ?>
    <?php if ($latest_posts_query->have_posts()) : ?>
        <h2>Newest Blog Posts</h2>
        <ul>
            <?php while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post(); ?>
                <?php get_template_part('template-parts/content', 'archive');?>
            <?php endwhile; ?>
        </ul>
        <?php
            
            $pagination = paginate_links(array(
                'total'     => $latest_posts_query->max_num_pages,
                'current'   => max(1, get_query_var('paged')),
            ));

            if ($pagination) {
                echo '<div class="pagination">' . $pagination . '</div>';
            }
        ?>

        <?php wp_reset_postdata(); // Restore global post data after custom query ?>
        
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
