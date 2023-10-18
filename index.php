<?php get_header(); ?>

<main>

    <!-- GALERIE DE PHOTO -->


    <?php
    $uri = explode('/', $_SERVER['REQUEST_URI']);
    var_dump($uri);
    $uri_nb = count($uri);
    switch ($uri[$uri_nb - 1]) {
        case 'photo-block':
            get_template_part('template-parts/photo-block');
            break;
        case 'single-photo':
            get_template_part('template-parts/content/single-photo');
            break;
    }

    ?>
</main>

<?php get_footer(); ?>