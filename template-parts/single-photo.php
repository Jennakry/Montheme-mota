<!-- 
 Template Name: Single-photo
 Template Post Type: post, page
  -->

<?php
get_header();

/* Start the Loop */
if (have_posts()) : while (have_posts()) : the_post();
?>
		<h2> <?php the_title(); ?></h2>

		<!-- <?php the_post_thumbnail();
				?> Affiche l'img mise en avant de wpress -->


		<div class="content">

			<?php the_content(); ?>

			<p>
				<strong> Référence:</strong>
				<?php echo get_post_meta(get_the_ID(), 'Référence', true); ?>
			</p>
			<p>
				<strong> Catégorie:</strong>
				<?php echo get_post_meta(get_the_ID(), 'Catégories', true); ?>
			</p>
			<p>
				<strong> Format:</strong>
				<?php echo get_post_meta(get_the_ID(), 'Formats', true); ?>
			</p>
			<p>
				<strong> Type:</strong>
				<?php echo get_post_meta(get_the_ID(), 'Type', true); ?>
			<p>
				<strong> Année:</strong>
				<?php echo get_post_meta(get_the_ID(), 'Année', true); ?>
			</p>

			</p>


		</div>


<?php
	endwhile;
endif; // End of the loop.

get_footer();
?>