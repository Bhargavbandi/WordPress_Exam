<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package u3a11
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" style="margin-top: 20px;background-color: #B5651D;padding-top: 10px;padding-bottom: 10px;text-align: center;">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'u3a11' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'u3a11' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'u3a11' ), 'starter_theme', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
