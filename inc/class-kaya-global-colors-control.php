<?php
/**
 * Global Colors Customizer control.
 *
 * Renders a container that the vanilla-JS script enhances into an add / edit /
 * remove color list. No jQuery, no wp-color-picker (uses native colour inputs).
 *
 *
 * @author  Anphira
 * @since   3.4
 * @package Kaya
 * @version 3.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'Kaya_Global_Colors_Control' ) ) {
	return;
}

/**
 * Class Kaya_Global_Colors_Control
 */
class Kaya_Global_Colors_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @var string
	 */
	public $type = 'kaya-global-colors';

	/**
	 * Render the control's content.
	 *
	 * @return void
	 */
	public function render_content() {
		$colors = kaya_get_global_colors();
		?>
		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>

		<div
			class="kaya-global-colors"
			data-setting="<?php echo esc_attr( $this->id ); ?>"
			data-value="<?php echo esc_attr( wp_json_encode( $colors ) ); ?>"
		>
			<ul class="kaya-global-colors__list"></ul>
			<button type="button" class="button kaya-global-colors__add">
				<?php esc_html_e( 'Add Color', 'kaya' ); ?>
			</button>
		</div>
		<?php
	}
}
