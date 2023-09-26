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
 * @version 1.3
 */

$postID = get_queried_object_id();

?>

	</div><!-- #content -->

	<?php 
	if( '' == get_post_meta($postID, '_kaya_hide_footer_check', true)) { 
		?>
		<footer id="colophon" class="site-footer">
			<h2 class="screen-reader-text">Footer</h2>
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
			<div class="site-info">
				<div class="container text-center">
					<div class="">
						<?php if(get_theme_mod( 'kaya_show_footer_social', false)) kaya_social_icons(); ?>
						Copyright &copy; <?php echo esc_html(date('Y')); ?>. All rights reserved. <?php bloginfo('name'); ?>. 
						<?php $privacy_policy = '';
						$privacy_policy = get_privacy_policy_url();
						if('' != $privacy_policy) {
							?>
							<a href="<?php echo esc_url($privacy_policy); ?>">Privacy Policy</a> 
						<?php 
						}
						if(get_theme_mod('kaya_accessibility_statement_url', '')) {
							?>
							| <a href="<?php echo esc_html(get_theme_mod( 'kaya_accessibility_statement_url' )); ?>">Accessibility Statement</a>
						<?php } ?>

						<?php if(get_theme_mod( 'kaya_footer_right', '' )) {
							echo get_theme_mod( 'kaya_footer_right' ); 
						} ?>
					</div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<?php 
	} // end if( '' == get_post_meta($postID, '_kaya_hide_footer_check', true))
	?>
</div><!-- #page -->



<?php wp_footer(); ?>



<?php 
if('' != get_theme_mod( 'kaya_add_to_body_bottom', '' )) {
	echo esc_html(get_theme_mod( 'kaya_add_to_body_bottom' ));
}
?>

</body>
</html>
