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
global $post;

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
<div class="slide">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
	
</div>
<?php endforeach; 
wp_reset_postdata();?>


	<div id="primary" class="content-area full-width">
		<div id="content" class="site-content" role="main">

			<?php
				rewind_posts();
				sequential_featured_pages();
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>