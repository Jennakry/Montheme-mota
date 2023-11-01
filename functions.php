<?php

// Ajoute la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajoute automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

// Ajout du menu dans le thème WordPress
function register_my_menus()
{
    register_nav_menu('main-menu', __('Menu principal', 'text-domain'));
    register_nav_menu('footer-menu', __('Menu du pied de page', 'text-domain'));
}
add_action('after_setup_theme', 'register_my_menus');

// Déclare les scripts JavaScript
function theme_enqueue_scripts()
{
    wp_enqueue_script('custom-script-1', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('custom-script-2', get_stylesheet_directory_uri() . '/js/filtre.js', array('jquery'), '1.0', true);
    wp_enqueue_script('custom-script-3', get_stylesheet_directory_uri() . '/js/lightbox.js', array('jquery'), '1.0', true);

    // Localisation des scripts pour les requêtes AJAX
    wp_localize_script('custom-script-2', 'frontendajax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('filter_photos_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Déclare le fichier style.css
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Traitement des requêtes Ajax pour les filtres
function filter_photos()
{

    $page = $_POST['page'];
    error_log('Current page: ' . $page);
    // Vérifiez le nonce pour la sécurité
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'filter_photos_nonce')) {
        wp_die('La sécurité de la requête n\'a pas pu être vérifiée.');
    }

    // Récupération des valeurs
    $category = $_POST['categories_photos'];
    $format = $_POST['formats'];
    $tri = $_POST['tri'];
    $page = $_POST['page'];

    // Configuration de la requête
    $args = array(
        'post_type' => 'photos',
        'paged' => $page,
        'posts_per_page' => 10, // Vous pouvez ajuster cela si nécessaire
        'order' => 'DESC', // Ou 'ASC'
        // Ajoutez ici d'autres arguments selon vos besoins
    );

    // Ajoutez les termes de la taxonomie 'categories-photos' si nécessaire
    if (!empty($category) && $category != 'default-category') {
        $args['tax_query'][] = array(
            'taxonomy' => 'categories-photos',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    // Ajoutez les termes de la taxonomie 'formats' si nécessaire
    if (!empty($format) && $format != 'default-format') {
        $args['tax_query'][] = array(
            'taxonomy' => 'formats',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    // La requête WP_Query
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Ici, vous incluriez le code pour afficher chaque photo
            // Par exemple, inclure un template part ou utiliser directement HTML
            get_template_part('template-parts/photo-block', 'photo');
        }
    } else {
        echo 'Aucune photo trouvée.';
    }

    wp_reset_postdata(); // Toujours réinitialiser après une requête personnalisée
    wp_die(); // Cela arrête l'exécution de PHP et retourne la réponse
}

add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');
