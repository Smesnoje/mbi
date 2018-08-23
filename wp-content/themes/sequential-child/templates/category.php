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

            <div class="products grid-container">
                <?php
                    $args = array( 'post_type' => 'product', 'product_cat' => $_GET['category'], 'orderby' => 'rand' );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                        <div class="product grid-item">    
                            <a class="product_link" style ="background-image: url('<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail_url($loop->post->ID, 'shop_catalog'); ?>')" href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                            </a>
                            <div class="product_properties">
                                <h3 class="product_properties--heading">
                                    <span class="product_properties--heading-title"><?php the_title(); ?> <?php echo $product->get_price_html(); ?> </span>
                                </h3> 
                                <div class="product_properties--button">
                                    <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div><!-- #products -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
