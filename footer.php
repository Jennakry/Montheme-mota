</body>
<footer class="footer">
    <?php wp_footer(); ?>
    <?php
    wp_nav_menu([
        'theme_location' => 'footer',
        'container' => 'false', //On retire le conteneur généré par WP

    ]);

    ?>

</footer>

</html>