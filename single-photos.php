<?php


get_header();

?>

<section class="photo_detail">
    <div class="content">
        <main class="site-main">
            <article class="container__photo" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- On récupèrer le ID et la classe de l'artcle -->

                <div class="post-content">
                    <div class="post-description">

                        <h2 class="title">
                            <?php the_title(); ?>
                        </h2>

                        <div class="description">
                            <p class="ref">
                                REFERENCE: <?php echo get_post_meta(get_the_ID(), 'reference', true); ?>
                                <!-- ACF  -->
                            </p>
                            <p>

                                CATEGORIE: <?php echo the_terms(get_the_ID(), 'categories-photos', false); ?>
                                <!-- CPT UI -->
                            </p>
                            <p>
                                TYPE: <?php echo get_post_meta(get_the_ID(), 'type', true); ?>
                            </p>
                            <p>

                                FORMAT: <?php echo the_terms(get_the_ID(), 'formats', false); ?>
                            </p>

                            <p>

                                ANNEE: <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    </div>

                    <div class="post-image container--image brightness">
                        <?php if (has_post_thumbnail()) : ?>

                            <img src="<?php the_post_thumbnail_url(array(500, 500)); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail">


                        <?php endif; ?>
                    </div>

            </article>

    </div>

    <div class="photo__contact">

        <p>Cette photo vous intéresse-t-elle?</p>


        <button class="btn" type="button"><a href="#" id="contact_btn" class="contact">Contact</a></button>


        <!-- On vérifie si le résultat de la requête contient des articles -->

        <div class="photo_choix">
            <div class="photo_avant">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();

                if (!empty($prev_post)) {
                    $prev_image = get_the_post_thumbnail_url($prev_post->ID);
                    previous_post_link(
                        '<span class="left"><img src="' .
                            $prev_image . '" alt="' . $prev_post->post_title . '" 
                            width="75" height="75"/> <a href="' . get_permalink($prev_post) . '" 
                            rel="prev"><img src="' . get_stylesheet_directory_uri() . '/assets/images/fleche-gauche.png"></a></span>',
                        '%title',
                        false
                    );
                }
                ?>
            </div>
            <div class="photo_apres">
                <?php
                if (!empty($next_post)) {
                    $next_image = get_the_post_thumbnail_url($next_post->ID);
                    next_post_link(
                        '<span class="right"><img src="' .
                            $next_image . '" alt="' . $next_post->post_title . '" 
                            width="75" height="75"/> <a href="' . get_permalink($next_post) . '" 
                            rel="next"><img src="' . get_stylesheet_directory_uri() . '/assets/images/fleche-droite.png"></a></span>',
                        '%title',
                        false
                    );
                }
                ?>
            </div>
        </div>
    </div>
    <div class="section3">
        <h3>VOUS AIMEREZ AUSSI</h3>

        <?php include_once "Block-single.php"; ?>

        <div class="btn-all-photos">
            <button class="btn" id="all-photos" type="button">
                <a href="http://localhost/mota/" aria-label="Page d'accueil de Nathalie Mota">Toutes les photos</a>
            </button>
        </div>

    </div>

</section>

</main>




</div>
<?php get_footer(); ?>