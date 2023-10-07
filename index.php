<?php get_header(); ?>


<main>
    <!-- HERO BANNER -->
    <div class="hero-banner" style="background-image: url('<?php echo esc_url($image_url); ?>');">
        <div class="hero-title">
            <img class="photo-banner" src="<?php echo get_template_directory_uri() . '/assets/images/Header.png'; ?>" alt="Titre du hero">
        </div>
    </div>


    <?php get_template_part('/template-parts/single-photo'); ?>

</main>

<?php get_footer(); ?>