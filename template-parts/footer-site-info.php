<?php
/**
 * The template for displaying the footer's lower section - site info.
 *
 * @author  Anphira
 * @since   2.0
 * @package Kaya
 * @version 2.2
 */

?>
		<div class="site-info">
			<div class="container text-center">
				<div class="">
					<?php if(get_theme_mod( 'kaya_show_footer_social', false)) kaya_social_icons(); ?>
					<p class="copyright-line">Copyright &copy; <?php echo esc_html(date('Y')); ?>. All rights reserved. <?php bloginfo('name'); ?>. 
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

					<?php if(get_theme_mod( 'kaya_footer_right', '' )) {
						echo '<p class="site-info-bottom-line">';
						echo wp_kses_post( get_theme_mod( 'kaya_footer_right' ) ); 
						echo '</p>';
					} ?>
				</div>
			</div>
		</div><!-- .site-info -->
