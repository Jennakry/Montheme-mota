<!DOCTYPE html>
<html lang="fr">

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

<body>
    <header>
        <nav id="navigation">
            <div class="img-logo">
                <img src="/mota/wp-content/themes/Montheme-mota/assets/images/logo.png">

            </div>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main-menu',
                    'menu_id' => 'primary-menu',
                )
            );
            ?>








        </nav>
    </header>