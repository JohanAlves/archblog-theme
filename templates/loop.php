<div class="post_card">
    <div class="post_category">
        <a href="">
            <?php echo get_the_category_list(' | ') ?>
        </a>
    </div>
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('postThumb'); ?></a>
    <a href="#">
        <h3><?php the_title(); ?></h3>
    </a>
    <p><?php echo wp_trim_words( get_the_content() , '15'); ?></p>
    <small><?php the_time( 'M d, Y' ); echo " | "; the_author_nickname(); ?></small>
</div>