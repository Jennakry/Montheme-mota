<footer class="footer">

    <?php
    wp_nav_menu([
        'theme_location' => 'footer',
        'container' => 'false', //On retire le conteneur généré par WP

    ]);
    ?>
    <aside id="widget-area">
        <?php dynamic_sidebar('footer-widget'); ?>
    </aside>
</footer>

<?php get_template_part('template-parts/contact'); ?>
<?php get_template_part('template-parts/lightbox'); ?>

</body>

</html>