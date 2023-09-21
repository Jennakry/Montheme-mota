<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mota</title>
    <?php wp_head(); ?>
</head>

<body>

    <nav id="navigation">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu_id' => 'primary-menu',
            )
        );
        ?>
    </nav>