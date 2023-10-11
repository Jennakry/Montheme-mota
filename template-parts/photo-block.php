<?php
/*
Template Name: Galerie de Photos
Template Post Type: page
*/
get_header(); ?>

<div id="primary" class="content-area">


    <?php
    // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
    $args = array(
        'post_type' => 'photos', // Remplacez 'photos' par le nom de votre CPT
        'posts_per_page' => 8, // Pour afficher toutes les publications
    );
    // 2. On exécute la WP Query
    $query = new WP_Query($args);


    // 3. On lance la boucle !
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

    ?>
            <div class=photo1>
                <?php
                the_post_thumbnail(); ?>



            </div>


            <!-- <div class="btn__wrapper">
                <a href="#!" class="btn btn__primary" id="load-more">Load more</a>
            </div> -->
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

<?php get_footer(); ?>