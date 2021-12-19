<?php get_header();

while (have_posts()):
    the_post();
?>


<section class="banner">
    <div class="container">
        <div class="banner_content">
            <h1>Designing the Future</h1>
        </div>
    </div>
</section>


    <section class="featured-posts">
        <div class="container">            

            <h2>POPULAR POSTS:</h2>
            <div class="featured-posts_grid">                

                <div class="featured-posts_large post_card">
                    <?php 
                    $featured_posts_main = new WP_query(array(
                        'orderby' =>'date',
                        'posts_per_page' => '1'                        
                    ));
                    while ($featured_posts_main->have_posts()):
                        $featured_posts_main->the_post();                    
                        get_template_part( 'templates/loop');
                        endwhile; wp_reset_postdata(); ?>
                </div>
                

                <div class="featured-posts_small">

                    <?php 
                    $featured_posts = new WP_query(array(
                        'orderby' =>'date',
                        'posts_per_page' => '2',
                        'offset' => '1'
                    ));
                    while ($featured_posts->have_posts()):
                        $featured_posts->the_post();                    
                        get_template_part( 'templates/loop');
                        endwhile; wp_reset_postdata(); ?>
                    
                </div>


            </div>
        </div>
        </div>
    </section>



    <?php get_template_part( 'templates/section','subscribe'); ?>


    <section class="category-front-page">
        <div class="container">
            <h2>MODERN</h2>
            <div class="posts-main-loop">

            <?php
                $modern_category = new WP_query(array(
                    'category_name' =>'modern',
                    'posts_per_page' => '3'
                ));

                while($modern_category->have_posts()):
                    $modern_category->the_post();
            
                    get_template_part( 'templates/loop');
                
                
             endwhile; wp_reset_postdata(); ?>

            </div>

            <a href="<?php echo site_url('/category/modern') ?>" class="link-see-all">
                <h3>SEE ALL POSTS</h3>
            </a>
        </div>
    </section>




    <section class="category-front-page">
        <div class="container">
            <h2>TRAVEL</h2>            
            <div class="posts-main-loop">

                <?php
                $modern_category = new WP_query(array(
                    'category_name' =>'travel',
                    'posts_per_page' => '3'
                ));

                while($modern_category->have_posts()):
                    $modern_category->the_post();
            
                    get_template_part( 'templates/loop');
                
                
                endwhile; wp_reset_postdata(); ?>
            </div>

            <a href="<?php echo site_url('/category/travel') ?>" class="link-see-all">
                <h3>SEE ALL POSTS</h3>
            </a>
        </div>
    </section>

    
    <?php get_template_part( 'templates/section','instagram'); ?>



<?php 
endwhile;
get_footer(); ?>