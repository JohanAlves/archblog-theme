<?php get_header();

while (have_posts()):
    the_post();

    if (is_page( 'about' )) get_template_part('templates/page','about');
    if (is_page( 'contact' )) get_template_part('templates/page','contact');
    









endwhile;
get_footer(); ?>