</body>
<footer class="footer">

    <?php get_template_part('template-parts/contact'); ?>
    <?php get_template_part('template-parts/lightbox'); ?>

    <nav class="footer-nav">

        <?php wp_footer(); ?>
        <?php
        wp_nav_menu([
            'theme_location' => 'footer',
            'container' => 'false', //On retire le conteneur généré par WP

        ]);

        ?>
    </nav>

</footer>

</html>