<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kaya
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-columns <?php if(get_theme_mod( 'kaya_footer_columns_in_grid' ) == true) echo 'container'; ?>">
			<?php 
			if(get_theme_mod( 'kaya_show_footer_columns' ) == true) {
				switch(get_theme_mod( 'kaya_footer_columns' )) {
					case 'one_column': 
						echo '<div class="columns-12">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						break;
					case 'two_column': 
						echo '<div class="columns-6">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						echo '<div class="columns-6">';
						dynamic_sidebar('Footer-2');
						echo '</div>';
						break;
					case 'three_column': 
						echo '<div class="columns-4">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						echo '<div class="columns-4">';
						dynamic_sidebar('Footer-2');
						echo '</div>';
						echo '<div class="columns-4">';
						dynamic_sidebar('Footer-3');
						echo '</div>';
						break;
					case 'four_column': 
						echo '<div class="columns-3">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						echo '<div class="columns-3">';
						dynamic_sidebar('Footer-2');
						echo '</div>';
						echo '<div class="columns-3">';
						dynamic_sidebar('Footer-3');
						echo '</div>';
						echo '<div class="columns-3">';
						dynamic_sidebar('Footer-4');
						echo '</div>';
						break;
				}
			} ?>
		</div>
		<div class="site-info">
			<div class="container">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kaya' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kaya' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s', 'kaya' ), 'Kaya', '<a href="https://www.anphira.com/" rel="designer">Anphira Web Design & Development</a>' ); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
