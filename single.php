<?php
    get_header()
?>
<div class="progress-container">
  <div class="progress-bar" id="progress-bar"></div>
</div>


<main class="pg-wrapper">
    <h1><?php the_title() ?></h1>

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
<section class="related-posts ">
    <div class="pg-wrapper">
        <h2 class="text-center">Related Articles</h2>
        <div class="related-post-container">

            <?php
                $post_categories = wp_get_post_categories(get_the_ID());
                $related_args = array(
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3,
                    'category__in' => $post_categories,
                    'orderby' => 'rand',
                );
                $related_query = new WP_Query($related_args);
                
                if ($related_query->have_posts()) {
                    
                    while ($related_query->have_posts()) {
                        $related_query->the_post();
                        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
                        $thumbnail_url = $thumbnail_src[0];
                        $thumbnail_alt = get_alt($thumbnail_url)
                        ?>
                        <div class="post-card">
                            <div class="post-thumbnail">
                                <img src="<?php echo $thumbnail_url?>" alt="<?php $thumbnail_alt?>" loading="lazy">
                            </div>
                            <div class="post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <span class="date-card"><?php echo the_modified_date(); ?></span>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } 
            ?>
        </div>
    </div>

    
</section>
<?php
    get_footer()
?>