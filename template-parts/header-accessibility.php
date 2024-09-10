<?php
/**
 * This is the template that displays all of the accessibility preferences panel
 *
 * @author  Anphira
 * @since   2.0
 * @package Kaya
 * @version 2.0
 */
?>

	<?php if(get_theme_mod( 'kaya_a11y_enable_checkbox', false )) { ?>
		<div class="a11y-options-bar container">
			<button id="kaya-a11y-open" onclick="kaya_show_a11y_options()"><i class="fas fa-universal-access"></i> Show preferences</button>
			<div id="kaya-a11y-options" style="display:none">
				<button id="kaya-a11y-close" onclick="kaya_hide_a11y_options()"><i class="fas fa-universal-access"></i> Close preferences</button>
				<h2 class="h4">Accessibility preferences</h2>

				<div class="flexbox">

				<?php if( get_theme_mod( 'kaya_a11y_textresize_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Text size:</legend>
							<input id="kaya-text-size-default" name="kaya-text-size" type="radio" value="default" onchange="kaya_set_text_size('default')"><label for="kaya-text-size-default">Default for site</label><br>
							<input id="kaya-text-size-small" name="kaya-text-size" type="radio" value="text-size-small" onchange="kaya_set_text_size('text-size-small')"><label for="kaya-text-size-small">Small</label><br>
							<input id="kaya-text-size-large" name="kaya-text-size" type="radio" value="text-size-large" onchange="kaya_set_text_size('text-size-large')"><label for="kaya-text-size-large">Large</label><br>
							<input id="kaya-text-size-xlarge" name="kaya-text-size" type="radio" value="text-size-xlarge" onchange="kaya_set_text_size('text-size-xlarge')"><label for="kaya-text-size-xlarge">Extra Large</label><br>
							<input id="kaya-text-size-huge" name="kaya-text-size" type="radio" value="text-size-huge" onchange="kaya_set_text_size('text-size-huge')"><label for="kaya-text-size-huge">Huge</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_lineheight_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Line spacing:</legend>
							<input id="kaya-line-spacing-default" name="kaya-line-spacing" type="radio" value="default" onchange="kaya_set_line_height('default')"><label for="kaya-line-spacing-default">Default for site</label><br>
							<input id="kaya-line-spacing-1" name="kaya-line-spacing" type="radio" value="line-height-1" onchange="kaya_set_line_height('line-height-1')"><label for="kaya-line-spacing-1">1</label><br>
							<input id="kaya-line-spacing-125" name="kaya-line-spacing" type="radio" value="line-height-125" onchange="kaya_set_line_height('line-height-125')"><label for="kaya-line-spacing-125">1.25</label><br>
							<input id="kaya-line-spacing-15" name="kaya-line-spacing" type="radio" value="line-height-15" onchange="kaya_set_line_height('line-height-15')"><label for="kaya-line-spacing-15">1.5</label><br>
							<input id="kaya-line-spacing-175" name="kaya-line-spacing" type="radio" value="line-height-175" onchange="kaya_set_line_height('line-height-175')"><label for="kaya-line-spacing-175">1.75</label><br>
							<input id="kaya-line-spacing-2" name="kaya-line-spacing" type="radio" value="line-height-2" onchange="kaya_set_line_height('line-height-2')"><label for="kaya-line-spacing-2">2</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_font_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Change font:</legend>
							<input id="kaya-font-family-default" name="kaya-font-family" type="radio" value="default" onchange="kaya_set_font_family('default')"><label for="kaya-font-family-default">Default for site</label><br>
							<input id="kaya-font-family-arial" name="kaya-font-family" type="radio" value="arial" onchange="kaya_set_font_family('arial')"><label for="kaya-font-family-arial">Arial</label><br>
							<input id="kaya-font-family-dyslexic" name="kaya-font-family" type="radio" value="dyslexic" onchange="kaya_set_font_family('dyslexic')"><label for="kaya-font-family-dyslexic">Open Dyslexic</label><br>
							<input id="kaya-font-family-times" name="kaya-font-family" type="radio" value="times" onchange="kaya_set_font_family('times')"><label for="kaya-font-family-times">Times New Roman</label><br>
							<input id="kaya-font-family-verdana" name="kaya-font-family" type="radio" value="verdana" onchange="kaya_set_font_family('verdana')"><label for="kaya-font-family-verdana">Verdana</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_contrast_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Change contrast:</legend>
							<input id="kaya-contrast-default" name="kaya-contrast" type="radio" value="on" onchange="kaya_set_contrast('default')"><label for="kaya-contrast-default">Default for site</label><br>
							<input id="kaya-contrast-white-bkgd" name="kaya-contrast" type="radio" value="on" onchange="kaya_set_contrast('white-bkgd-black-txt')"><label for="kaya-contrast-white-bkgd">White background with black text</label><br>
							<input id="kaya-contrast-black-bkgd" name="kaya-contrast" type="radio" value="off" onchange="kaya_set_contrast('black-bkgd-white-txt')"><label for="kaya-contrast-black-bkgd">Black background with white text</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_inputs_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Enhance inputs areas:</legend>
							<input id="kaya-enhance-inputs-off" name="kaya-enhance-inputs" type="radio" value="off" onchange="kaya_set_enhance_inputs('off')"><label for="kaya-enhance-inputs-off">Default for site: Off</label><br>
							<input id="kaya-enhance-inputs-on" name="kaya-enhance-inputs" type="radio" value="on" onchange="kaya_set_enhance_inputs('on')"><label for="kaya-enhance-inputs-on">On</label>
						</fieldset>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>