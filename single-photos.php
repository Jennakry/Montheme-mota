<?php


get_header();

?>
<div class="content">
    <main class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- On récupèrer le ID et la classe de l'artcle -->

            <div class="post-content">
                <div class="post-description">

                    <h2 class="title">
                        <?php the_title(); ?>
                    </h2>
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

                </div>

                <div class="post-image">
                    <?php if (has_post_thumbnail()) : ?>

                        <img src="<?php the_post_thumbnail_url(array(500, 500)); ?>" alt="<?php the_title_attribute(); ?>" class="post-thumbnail">

                    <?php endif; ?>
                </div>



            </div>

            <div class="border-line">

                <p>Cette photo vous intéresse-t-elle?</p>

                <div class="myBtn">
                    <button>Contact</button>
                </div>

            </div>

            <p>VOUS AIMEREZ AUSSI</p>
        </article>


    </main>




</div>
<?php get_footer(); ?>