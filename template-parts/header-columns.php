<?php
/**
 * This is the template that displays the header columns & menu
 *
 * @author  Anphira
 * @since   2.0
 * @package Kaya
 * @version 2.3
 */
?>


		<div class="container flexbox-non-responsive">
			<?php 
			switch(get_theme_mod( 'kaya_header_columns', 'one_column' )) {
				case 'one_column': 
					echo '<div class="">';
						do_action('kaya_logo_display');
					echo '</div>';
					break;
				case 'two_column': 
					echo '<div class="">';
						do_action('kaya_logo_display');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				case 'three_column': 
					echo '<div class="">';
						do_action('kaya_logo_display');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					break;
				case 'four_column': 
					echo '<div class="">';
						do_action('kaya_logo_display');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-4');
					echo '</div>';
					break;
				case 'logo_menu':
					echo '<div class="kaya-left-side">';
						do_action('kaya_logo_display');
					echo '</div>';
					echo '<div class="kaya-right-side">';
						dynamic_sidebar('Header-2');
						echo '<nav id="site-navigation" class="main-navigation">';
						if( ! get_theme_mod( 'kaya_hide_mobile_button_menu', false ) ) {
							?><button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button><?php
						}
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
						echo '</nav>';
					echo '</div>';
					break;
				case 'logo_left_right_content':
					echo '<div class="kaya-left-side">';
						do_action('kaya_logo_display');
					echo '</div>';
					echo '<div class="kaya-right-side">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				default: 
					echo '<div class="">';
						do_action('kaya_logo_display');
					echo '</div>';
					break;
			} ?>
			
		</div><!-- .container -->

		<?php if( 'logo_menu' !== get_theme_mod( 'kaya_header_columns', 'one_column' )) { ?>
		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<?php if( !get_theme_mod( 'kaya_hide_mobile_button_menu', false )) { ?>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button>
				<?php } ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div> <!-- .container -->
		</nav><!-- #site-navigation -->
		<?php } ?>