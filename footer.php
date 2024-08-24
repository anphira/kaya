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
 * @version 1.10
 */

$postID = get_queried_object_id();

?>

	</div><!-- #content -->

	
	<footer id="colophon" class="site-footer">
		<h2 class="screen-reader-text">Footer</h2>
		<?php // hide the upper footer if set on page
		if( '' == get_post_meta($postID, '_kaya_hide_footer_check', true)) { 
			?>
			<div class="footer-columns flexbox <?php if(get_theme_mod( 'kaya_footer_columns_in_grid', false )) echo 'container'; ?>">
				<?php 
				if(get_theme_mod( 'kaya_show_footer_columns', false )) {
					switch(get_theme_mod( 'kaya_footer_columns', 'one_column' )) {
						case 'one_column': 
							echo '<div class="">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							break;
						case 'two_column': 
							echo '<div class="">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							echo '<div class="">';
							dynamic_sidebar('Footer-2');
							echo '</div>';
							break;
						case 'three_column': 
							echo '<div class="">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							echo '<div class="">';
							dynamic_sidebar('Footer-2');
							echo '</div>';
							echo '<div class="">';
							dynamic_sidebar('Footer-3');
							echo '</div>';
							break;
						case 'four_column': 
							echo '<div class="">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							echo '<div class="">';
							dynamic_sidebar('Footer-2');
							echo '</div>';
							echo '<div class="">';
							dynamic_sidebar('Footer-3');
							echo '</div>';
							echo '<div class="">';
							dynamic_sidebar('Footer-4');
							echo '</div>';
							break;
						default: 
							echo '<div class="">';
							dynamic_sidebar('Footer-1');
							echo '</div>';
							break;
					}
				}  // end if(true == get_theme_mod( 'kaya_show_footer_columns' ))
				?>
			</div>
		<?php 
		} // end if( '' == get_post_meta($postID, '_kaya_hide_footer_check', true))
		?>
		<div class="site-info">
			<div class="container text-center">
				<div class="">
					<?php if(get_theme_mod( 'kaya_show_footer_social', false)) kaya_social_icons(); ?>
					<p>Copyright &copy; <?php echo esc_html(date('Y')); ?>. All rights reserved. <?php bloginfo('name'); ?>. 
						<?php $privacy_policy = '';
						$privacy_policy = get_privacy_policy_url();
						if('' != $privacy_policy) {
							?>
							<a href="<?php echo esc_url($privacy_policy); ?>">Privacy Policy</a> 
						<?php 
						}
						if(get_theme_mod('kaya_terms_of_service_url', '')) {
							?>
							| <a href="<?php echo esc_html(get_theme_mod( 'kaya_terms_of_service_url' )); ?>">Terms of Service</a>
						<?php }
						if(get_theme_mod('kaya_cookie_policy_url', '')) {
							?>
							| <a href="<?php echo esc_html(get_theme_mod( 'kaya_cookie_policy_url' )); ?>">Cookie Policy</a>
						<?php }
						if(get_theme_mod('kaya_accessibility_statement_url', '')) {
							?>
							| <a href="<?php echo esc_html(get_theme_mod( 'kaya_accessibility_statement_url' )); ?>">Accessibility Statement</a>
						<?php } ?>
						<?php if(get_theme_mod('kaya_sitemap_url', '')) {
							?>
							| <a href="<?php echo esc_html(get_theme_mod( 'kaya_sitemap_url' )); ?>">Sitemap</a>
						<?php } ?>
					</p>

					<p><?php if(get_theme_mod( 'kaya_footer_right', '' )) {
						echo wp_kses_post( get_theme_mod( 'kaya_footer_right' ) ); 
					} ?></p>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
		
</div><!-- #page -->



<?php wp_footer(); ?>


</body>
</html>
