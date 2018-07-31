<?php /* Template Name: Category */ ?>

<?php
/**
 * The template for displaying all single posts.
 *
 * @package Sequential
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	<h1 class="heading_primary"> <?php echo $_GET['category']; ?> </h1>
    <?php
        $args = array( 'post_type' => 'product', 'product_cat' => $_GET['category'], 'orderby' => 'rand' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="product">    
                    <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                        <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                        <h3><?php the_title(); ?></h3>
                        <span class="price"><?php echo $product->get_price_html(); ?></span>                    
                    </a>
                    <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                </div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
