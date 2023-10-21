<section class="hero-banner">
    <div class="photoHero">
        <img class="Titre_header" src="<?php echo get_template_directory_uri(); ?>'/assets/images/Titre-header.png'" alt="logo">
        <!-- PHOTO ALEATOIRE -->
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
</section>