<?php
function arch_blog_enqueue(){

    wp_enqueue_style( 'wp-style',get_template_directory_uri().'/style.css');
    wp_enqueue_style( 'main-style',get_template_directory_uri().'/scss/style.css');   
    wp_enqueue_style( 'google-fonts',"https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600&display=swap");   
    wp_enqueue_script('font-awesome','https://kit.fontawesome.com/f60a04e988.js','1.0',null,true);
    wp_enqueue_script('header-js',get_template_directory_uri().'/js/header.js','1.0',null,true);
    wp_enqueue_script('search-js',get_template_directory_uri().'/js/search.js','1.0',null,true); 
    
    wp_localize_script( 'search-js', 'theme_props', array(
        'site_url' => get_site_url()
    ) );

}add_action('wp_enqueue_scripts','arch_blog_enqueue');



function arch_blog_inits(){
    register_nav_menu('primary-menu',__( 'Primary Menu' ));
    

}add_action('init', 'arch_blog_inits');



function arch_blog_theme_extensions(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_image_size('instagramSize', 500, 500, true);
    add_image_size('postThumb', 840, 840, true);
    add_image_size('postSingle', 1500, 840, true);
    

}add_action('after_setup_theme', 'arch_blog_theme_extensions');