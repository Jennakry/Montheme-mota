<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');


//Ajout du menu dans le theme WORDPRESS

function register_my_menu()
{

    register_nav_menu('main-menu', __('Menu principal', 'text-domain'));
    register_nav_menu('footer', 'Pied de page');
}
add_action('after_setup_theme', 'register_my_menu');

//Déclare le JS//
function theme_enqueue_scripts()
{
    wp_enqueue_script('scripts-1', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

//Déclare le fichier style.css
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
