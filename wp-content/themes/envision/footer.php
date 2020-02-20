<?php
/**
 * @package envision
 */
?>

		</div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php get_sidebar( 'footer' ); ?>
			<div class="site-info">
				<?php do_action( 'envision_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'envision' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'envision' ), 'WordPress' ); ?></a>
				<span> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'envision' ), 'Envision', '<a href="http://southernweb.com" rel="designer nofollow">Southern Web</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>