<?php
/*
Template Name: Galerie de Photos
Template Post Type: page
*/
get_header(); ?>

<!-- HERO BANNER -->


<div class="hero-banner">
    <div class="photo-event">
        <img src="<?php echo get_template_directory_uri(); ?>'/assets/images/Titre-header.png'" alt="logo">
    </div>

    <div class="photoHero">
        <?php
        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 1,
            'orderby' => 'rand',
        );

        $loop = new WP_Query($args);

        while ($loop->have_posts()) : $loop->the_post();
            the_post_thumbnail();
        endwhile;
        wp_reset_postdata();
        ?>

    </div>
</div>

<!-- FILTRE ET TRI -->
<div class="contain-select">

    <div class="custom-select" style="width:260px;">
        <select>
            <option value="0">Catégories</option>
            <option value="1">Mariage</option>
            <option value="2">Concert</option>
            <option value="3">Réception</option>
            <option value="4">Télévision</option>
        </select>
    </div>

    <div class="custom-select-format" style="width:260px;">
        <select>
            <option value="0">Formats</option>
            <option value="1">Paysage</option>
            <option value="2">Portrait</option>
        </select>
    </div>

</div>

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



<button id="load-more">Charger plus</button>

<?php get_footer(); ?>