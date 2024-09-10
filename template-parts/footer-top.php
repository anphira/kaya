<?php
/**
 * The template for displaying the footer's top section including columns.
 *
 * @author  Anphira
 * @since   2.0
 * @package Kaya
 * @version 2.0
 */

$postID = get_queried_object_id();

?>
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