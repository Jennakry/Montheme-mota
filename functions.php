<?php

// Ajoute la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajoute automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');


//Ajout du menu dans le theme WORDPRESS

function register_my_menu()
{

    register_nav_menu('main-menu', __('Menu principal', 'text-domain'));
    register_nav_menu('footer', 'Pied de page');
}
add_action('after_setup_theme', 'register_my_menu');

// swiper-style
if (is_front_page()) {
    // wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css' );
    wp_enqueue_style('swiper-style', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_script('swiper-element-bundle.min', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), '9.2.0', true);
    // wp_enqueue_script( 'swiper-element-bundle.min', get_theme_file_uri( '/assets/js/swiper-bundle.min.js', array(), '9.2.0', true));
};

//Déclare le JQUERY ET JAVASCRIPT//
function theme_enqueue_scripts()
{
    wp_enqueue_script('scripts-1', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

//Déclare le fichier STYLE.CSS
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


// activer les Dashicons
wp_enqueue_style('dashicons');
add_action('wp_enqueue_scripts', 'nathalie_mota_theme_enqueue');



// BOUTON CHARGER PLUS//

function load_more_posts()
{
    $ajaxposts = new WP_Query([
        'post_type' => 'photos',
        'posts_per_page' => 6,
        'paged' => $_POST['paged'],
    ]);

    $response = '';

    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()) :
            $ajaxposts->the_post();
            $response .= get_template_part('photo-block');
        endwhile;
    } else {
        $response = '';
    }

    echo $response;
    exit;
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');
