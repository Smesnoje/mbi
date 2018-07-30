<?php /* Template Name: AboutUsPage */ ?>

<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sequential
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					if ( 'jetpack-testimonial' === get_post_type() ) {
						get_template_part( 'content', 'testimonial' );
					} else {
						get_template_part( 'content', 'single' );
					}
					?>
				<h3 class="location-title"> Lokacija 	</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2827.4009914968374!2d20.670118315573777!3d44.87448797909839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7f0244d326f3%3A0x48c3fd0439dbb3c6!2sMASTON+BI!5e0!3m2!1sen!2srs!4v1531918189469" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

			<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
