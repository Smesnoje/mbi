<?php /* Template Name: Front  */ ?>

<?php
/**
 * Template Name: Front Page
 *
 * @package Sequential
 */

get_header(); ?>
<?php $args = array(
	'posts_per_page'   => 5,
	'offset'           => 0,
	'category'         => '',
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'post',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   => '',
	'author_name'	   => '',
	'post_status'      => 'publish',
	'suppress_filters' => true,
	'fields'           => '',
);
?>

<?php
get_header(); ?>

  <script type="text/javascript">

  </script>
  <script type="text/javascript">
    (function($) {
	$(document).ready(function(){
      $('.slider').slick({
		arrows: true,
		prevArrow: $ ('.prev-slide'),
		nextArrow: $ ('.next-slide'),
  		infinite: true,
  		speed: 300,
  		slidesToShow: 1,
  		adaptiveHeight: false
      });
    });
    })(jQuery);
</script>

	<div class="hero">
		<div class="slider-wrapper">
				<span class="arr prev-slide"></span>
				<span class="arr next-slide"></span>
			<div class="slider">
				<?php
				global $post;

				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				<div class="slider-content">

					<div class="slider-content_left" style="background-image: url(<?php the_post_thumbnail_url( $size ); ?> )">

					</div>

					<div class="slider-content_right">

						<h2 class="slider-content_right--title">
							<?php the_title(); ?>
						</h2>

						<div class="slider-content_right--text">
							<?php the_excerpt(); ?>					
						</div>
						<?php

							// Links
							$field = get_field_object('existing_or_custom_link');
							$value = $field['value'];
							

						?>
						
						<a href="
						<?php 
						if ($value == "Existing"){
						 the_field('page');
						}
						elseif($value == "Custom") {
							the_field('link');
						}
						?>
						" class="slider-content_right--link">
							Take a look
						</a>
					</div>

				</div>

				<?php endforeach; 
				wp_reset_postdata();?>
			</div><!-- .slider -->
		</div><!-- .slider-wrapper -->
	</div><!-- .hero -->


	<div id="primary" class="content-area full-width">
		<div id="content" class="site-content" role="main">

			<?php
				rewind_posts();
				sequential_featured_pages();
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>