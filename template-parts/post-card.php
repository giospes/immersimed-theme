<?php 
    $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
    
    $img_place_holder = get_theme_mod('image_placeholder', '');
    if($thumbnail_src){
        $thumbnail_url = $thumbnail_src[0];
    }else{
        $thumbnail_url = $img_place_holder ;
    }
    $thumbnail_alt = get_alt($thumbnail_url);
   
?>

<div class="post-card" id="post-card-<?php the_ID(); ?>" data-permalink="<?php the_permalink(); ?>">
    <div class="post-thumbnail">
        <img src="<?php echo $thumbnail_url?>" alt="<?php $thumbnail_alt?>" loading="lazy">
    </div>
    <div class="post-content">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <span class="date-card"><?php echo the_modified_date(); ?></span>
    </div>
</div>