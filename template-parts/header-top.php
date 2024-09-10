<?php
/**
 * This is the template that displays the top bar section of the header
 *
 * @author  Anphira
 * @since   2.0
 * @package Kaya
 * @version 2.0
 */
?>

		<?php if(get_theme_mod( 'kaya_top_header', false )) { ?>
			<div class="top-header">
				<div class="container flexbox">
					<div class="">
						<?php dynamic_sidebar('top-header-1'); ?>
					</div>
					<div class="">
						<?php dynamic_sidebar('top-header-2'); ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		<?php } ?>