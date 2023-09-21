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
    <p>je suis avant la fin du body</p>
<?php

}

add_action('wp_footer', 'footer_montheme');
