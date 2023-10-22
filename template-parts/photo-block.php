<?php

/**
 * Photo-block : ACCUEIL 
 *
 * @package WordPress
 * @subpackage Montheme-mota
 */

/*
Template Name: Galerie de Photos
Template Post Type: page
*/
get_header(); ?>




<section class="hero-content-banner">
    <!-- CHARGEMENT DU HERO BANNER -->
    <?php get_template_part('banner'); ?>
    <!-- CHARGEMENT DES FILTRES -->
    <?php get_template_part('filtre'); ?>



    <!--------------- GALLERIE PHOTOS ----------->
    <div id="primary" class="content-area">
        <section class="contain-photos">
            <?php
            // 1. On définit le tableau d'argument pour définir ce que l'on souhaite récupérer
            $args = array(
                'post_type' => 'photos', // On récupère les oublications de type"photos"
                'posts_per_page' => 8, // On en affiche 8 par page
                'paged' => 1, //On commenc epar la première page 
            );
            // 2. On exécute la WP Query
            $query = new WP_Query($args);
            $index = 0;


            // 3. On lance la boucle !
            if ($query->have_posts()) :
                while ($query->have_posts()) : //parcourir les publications récupérés
                    $query->the_post();
                    $post_url = get_permalink(); // Récupération de l'URL du post et la stockez dans $post_url

            ?>
                    <!-- Affichage de la galerie photo -->
                    <div class="photo1 brightness">

                        <h2 class="info-title"><?php the_title(); ?></h2>
                        <h3 class="info-tax"><?php echo $categories; ?></h3>
                        <a href="<?php the_permalink() ?>" aria-label="Voir le détail de la photo" <?php the_title(); ?>" alt="<?php the_title(); ?>" title="Voir le détail de la photo">
                            <span class="detail-photo"></span></a>

                        <?php
                        the_post_thumbnail(); ?>
                    </div>



                    <!-- LIGHTBOX -->
                    <?php get_template_part('lightbox'); ?>

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
    <button class="btn_load-more" id="load-more">Charger plus</button>


</section>

<?php get_footer(); ?>