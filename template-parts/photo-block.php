<?php
/*
Template Name: Galerie de Photos
Template Post Type: page
*/
get_header(); ?>

<!-- HERO BANNER -->


<?php get_template_part('banner'); ?>

<?php get_template_part('filtre'); ?>

<div id="primary" class="content-area">

    <?php
    // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
    $args = array(
        'post_type' => 'photos', // Remplacez 'photos' par le nom de votre CPT
        'posts_per_page' => 8, // Pour afficher toutes les publications
        'paged' => 1,
    );
    // 2. On exécute la WP Query
    $query = new WP_Query($args);
    $index = 0;


    // 3. On lance la boucle !
    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            $post_url = get_permalink(); // Récupération de l'URL du post

    ?>

            <div class=photo1>
                <?php
                the_post_thumbnail(); ?>



            </div>



        <?php
        endwhile; ?>
    <?php
    else :
        echo 'Aucune photo trouvée.';
    endif;

    // 4. On réinitialise à la requête principale (important)
    wp_reset_postdata();
    ?>


</div>

<!------------------------------ BOUTON  CHARGER PLUS------------------>



<div class="btn__wrapper">
    <button id="load-more" class="btn_charger_plus">Charger plus</button>
</div>

<?php include('lightbox.php'); ?>

<?php get_footer(); ?>