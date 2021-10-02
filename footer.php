<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.0
 */

?>

	</div><!-- #content -->

	<?php 
	if( '' == get_post_meta($post->ID, '_kaya_hide_footer_check', true)) { 
		?>
		<footer id="colophon" class="site-footer">
			<div class="footer-columns <?php if(get_theme_mod( 'kaya_footer_columns_in_grid', false )) echo 'container'; ?>">
				<?php 
				if(get_theme_mod( 'kaya_show_footer_columns', false )) {
					switch(get_theme_mod( 'kaya_footer_columns', 'one_column' )) {
						case 'one_column': 
							echo '<div class="columns-12 last">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							break;
						case 'two_column': 
							echo '<div class="columns-6">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							echo '<div class="columns-6 last">';
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
							echo '<div class="columns-4 last">';
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
							echo '<div class="columns-3 last">';
							dynamic_sidebar('Footer-4');
							echo '</div>';
							break;
						default: 
							echo '<div class="columns-12 last">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							break;
					}
				}  // end if(true == get_theme_mod( 'kaya_show_footer_columns' ))
				?>
			</div>
			<div class="site-info">
				<div class="container">
					<div class="columns-6">
						<?php if(get_theme_mod( 'kaya_show_footer_social', false)) kaya_social_icons(); ?>
						Copyright &copy; <?php echo date('Y'); ?>. All rights reserved. <?php bloginfo('name'); ?>. 
						<?php $privacy_policy = '';
						$privacy_policy = get_privacy_policy_url();
						if('' != $privacy_policy) {
							?>
							<a href="<?php echo $privacy_policy; ?>">Privacy Policy</a> 
						<?php 
						}
						if(get_theme_mod('kaya_accessibility_statement_url', '')) {
							?>
							| <a href="<?php echo htmlspecialchars_decode(get_theme_mod( 'kaya_accessibility_statement_url' )); ?>">Accessibility Statement</a>
						<?php } ?>
					</div>
					<div class="columns-6 last text-right">
						<?php if(get_theme_mod( 'kaya_footer_right', '' )) {
							echo htmlspecialchars_decode(get_theme_mod( 'kaya_footer_right' )); 
						}
						else { ?>
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kaya' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kaya' ), 'WordPress' ); ?></a>
						<br />
						<a href="<?php echo esc_url( __( 'https://www.anphira.com/', 'kaya' ) ); ?>"><?php printf( esc_html__( 'Theme: Kaya by %s', 'kaya' ), 'Anphira Web Design & Development' ); ?></a>
						<?php } ?>
					</div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<?php 
	} // end if( '' == get_post_meta($post->ID, '_kaya_hide_footer_check', true))
	?>
</div><!-- #page -->




<?php 
if('' != get_theme_mod( 'kaya_cf7_redirect_url', '')) { 
	?>
	<script>
	document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '<?php echo get_theme_mod( 'kaya_cf7_redirect_url' ); ?>';
	}, false );
	</script>
	<?php 
}
?>


<?php wp_footer(); ?>

<!-- instant page preloading script -->
<script src="//instant.page/5.1.0" type="module" integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>



<?php 
if('' != get_theme_mod( 'kaya_add_to_body_bottom', '' )) {
	$tempy = get_theme_mod( 'kaya_add_to_body_bottom' );
	echo htmlspecialchars_decode($tempy);
}
?>

</body>
</html>
