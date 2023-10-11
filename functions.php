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

//Déclare le JQUERY ET JAVASCRIPT//
function theme_enqueue_scripts()
{
    wp_enqueue_script('jquery'); // On annule l'inscription du jQuery de WP
    wp_enqueue_script('scripts-1', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

//Déclare le fichier STYLE.CSS
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


// LOAD MORE

function weichie_load_more()
{
    $ajaxposts = new WP_Query([
        'post_type' => 'publications',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $_POST['paged'],
    ]);

    $response = '';

    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= get_template_part('parts/card', 'publication');
        endwhile;
    } else {
        $response = '';
    }

    echo $response;
    exit;
}
add_action('wp_ajax_weichie_load_more', 'weichie_load_more');
add_action('wp_ajax_nopriv_weichie_load_more', 'weichie_load_more');
