
<section class="general-info">
    <div class="author">
        <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'))); ?>" alt="Author Avatar" width="48" height="48">
        <p><?php the_author(); ?></p>
    </div>
    <div class="date">
        <p>Aggionato: <?php echo the_modified_date(); ?></p>
        <p>Pubblicato: <?php echo get_the_date(); ?></p>
    </div>  
</section>


<div class="sg-text-wrapper">
    <?php the_content();?> 
</div>
