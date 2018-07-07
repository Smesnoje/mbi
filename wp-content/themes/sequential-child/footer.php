<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Sequential
 */
?>

	</div><!-- #content -->

	<?php get_sidebar( 'footer' ); ?>

	<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<nav class="footer-navigation" role="navigation">
			<?php
				wp_nav_menu( array(
					'theme_location'  => 'footer',
					'container_class' => 'menu-footer',
					'menu_class'      => 'clear',
					'depth'           => 1,
				) );
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<p>All rights reserved. <strong>Maston Bi</strong> 2002- <?php echo date("Y");?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- <script type="text/javascript" src="wp-content/themes/sequential-child/node_modules/aos/dist/aos.js"></script> -->
<script type="text/javascript" src="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js"></script>


</body>
</html>