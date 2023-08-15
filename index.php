<?php get_header(); ?>
<main>
    <h1 class="text-center"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
    <div class="pg-wrapper">
        <section class="sliding post-in-evidenza">
            <h2>Post in evidenza</h2>
            <div class="slider">        
                <?php
                    $args = array(
                        'category_name' => 'in-evidenza', // Replace with your category slug
                        'posts_per_page' => 5, // Display 10 posts with the category
                    );
                    
                    $evidenza_posts = new WP_Query($args);
                    

                    if ($evidenza_posts->have_posts()){
                        while ($evidenza_posts->have_posts()){
                            $evidenza_posts->the_post();
                            get_template_part('template-parts/post', 'card');
                            
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </section>

        <section class="sliding recenti">
            <h2>Post più recenti</h2>
            <div class="slider">        
                <?php
                    $latest_posts = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 8, // Change this number to the desired number of latest posts
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                    

                    if ($latest_posts->have_posts()){
                        while ($latest_posts->have_posts()){
                            $latest_posts->the_post();
                            get_template_part('template-parts/post', 'card');
                            
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </section>
        <section class="sliding categories ">
            <h2>Post più recenti</h2>
            <ul class="slider">        
                <?php
                    $categories = get_categories();
                    

                    foreach ($categories as $category) { ?>
                       <li><a href="<?php echo esc_url(get_category_link($category->term_id))?>" class="category-btn"> <?php echo esc_html($category->name)?></a></li>
                    
                    
                    <?php } ?>
            </ul>
        </section>
    </div>
    
</main>
<?php get_footer(); ?>

