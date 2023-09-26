<!-- Ajout du menu dans le theme WORDPRESS -->
<?php

function register_my_menu()
{
    register_nav_menu('main-menu', 'Menu principal');
}
add_action('after_setup_theme', 'register_my_menu');


// WP-head
function head_css_montheme()
{

?>

<?php

}

add_action('wp_head', 'head_css_montheme');

// wp_footer

function footer_montheme()

{
?>

<?php

}

add_action('wp_footer', 'footer_montheme');

//Déclare le fichier style.css
function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

//Déclare le JS//
function theme_enqueue_scripts()
{
    wp_enqueue_script('scripts-1', get_stylesheet_directory_uri() . '/js/script.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
