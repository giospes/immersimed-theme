<p> <?php the_date(); ?> </p>

<p class="tag">
    <?php 
       echo the_tags()
    ?>
</p>


<div class="bg-prymary"><?php the_content();?> </div>
<p class="comments-count">
    <?php 
       comments_template();
    ?>
</p>