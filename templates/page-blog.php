<?php get_header(); ?>


<section class="banner">

    <div class="container">
        <div class="banner_content">
            <h1><?php echo get_the_archive_title(); ?></h1>
        </div>
    </div>
</section>

<section class="category-front-page">
    <div class="container">
        <div class="posts-main-loop">
            <?php 
            while (have_posts()):

                the_post();
                get_template_part( 'templates/loop');

            endwhile;
            echo paginate_links();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>