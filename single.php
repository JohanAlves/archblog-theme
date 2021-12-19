<?php get_header(); 
while (have_posts()):
    the_post();
?>
<section class="banner">
        <div class="container">
            <div class="banner_content">
                <h1><?php the_title(); ?></h1>
                <small><?php the_time( 'M d, Y' ); echo " | By ". get_the_author_nickname(); ?></small>
            </div>
        </div>
    </section>

    <section class="single-post">
        <div class="container">
            <?php the_post_thumbnail('postSingle'); ?>
            <div class="single-post_content">                
                <p><?php the_content(); ?></p>
            </div>
        </div>
    </section>


    <?php 
    endwhile;
    get_template_part( 'templates/section','subscribe'); 
    
    get_template_part( 'templates/section','instagram');
    ?>

    <?php get_footer(); ?>


    