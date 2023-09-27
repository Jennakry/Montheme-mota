<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- FONT SPACE MONO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">

    <title>Mota</title>

    <?php wp_head(); ?>

</head>

<body class="home blog logged-in admin-bar no-customize-support">

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>


        <header>
            <nav role="navigation" aria-label="<?php _e('Menu principal', 'text-domain'); ?>">

                <a class="btn btn-navbar" id="btnMenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <!-- Affiche le "Menu princiapal" enregistré au préalable. -->
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => 'false', //On retire le conteneur généré par WP

                ]);

                ?>

                <?php get_template_part('template-parts/contact'); ?>


            </nav>
        </header>