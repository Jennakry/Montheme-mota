<?php

/**
 * HERO DU HEADER
 *
 * @package WordPress
 * @subpackage Montheme-mota
 */
?>


<div class="photoHero">
    <div class="hero-thumbnail">
        <img class="Titre_header" src="<?php echo get_template_directory_uri(); ?>'/assets/images/Titre-header.png'" alt="logo">
        <!-- PHOTO ALEATOIRE -->

    </div>
        <?php
        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 1, //1 seul élement à récupéré
            'orderby' => 'rand', //Aléatoirement
        );
// Création de l'objet WP_Query
        $loop = new WP_Query($args);

// Démarrage de la boucle
        while ($loop->have_posts()) : $loop->the_post();
            the_post_thumbnail();
        endwhile;
        
// Réinitialisation des données post
        wp_reset_postdata();
        ?>
    
</div>
</section>