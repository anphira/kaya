<?php
/**
 * Global Colors for the Kaya theme.
 *
 * Adds a "Global Colors" section to the Customizer with a default palette and
 * the ability to add, edit, and remove colors. Registered colors appear in the
 * block editor color palette and as CSS custom properties (--slug) on the front
 * end and in the editor.
 *
 * @author  Anphira
 * @since   3.4
 * @package Kaya
 * @version 3.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The default global color palette.
 *
 * @return array
 */
function kaya_get_default_global_colors() {
	return array(
		array(
			'name'  => __( 'Heading color', 'kaya' ),
			'slug'  => 'heading-color',
			'color' => '#222222',
		),
		array(
			'name'  => __( 'Text color', 'kaya' ),
			'slug'  => 'text-color',
			'color' => '#222222',
		),
		array(
			'name'  => __( 'Link color', 'kaya' ),
			'slug'  => 'link-color',
			'color' => '#2852c4',
		),
		array(
			'name'  => __( 'Link hover color', 'kaya' ),
			'slug'  => 'link-hover-color',
			'color' => '#2852c4',
		),
		array(
			'name'  => __( 'Accent color 1', 'kaya' ),
			'slug'  => 'accent-color-1',
			'color' => '#ce0909',
		),
		array(
			'name'  => __( 'Accent color 2', 'kaya' ),
			'slug'  => 'accent-color-2',
			'color' => '#017049',
		),
		array(
			'name'  => __( 'Accent color 3', 'kaya' ),
			'slug'  => 'accent-color-3',
			'color' => '#8d0bbd',
		),
		array(
			'name'  => __( 'Background color 1', 'kaya' ),
			'slug'  => 'background-color-1',
			'color' => '#f7f7f7',
		),
		array(
			'name'  => __( 'Background color 2', 'kaya' ),
			'slug'  => 'background-color-2',
			'color' => '#eeeeee',
		),
		array(
			'name'  => __( 'Border color', 'kaya' ),
			'slug'  => 'border-color',
			'color' => '#777777',
		),
		array(
			'name'  => __( 'Button background color', 'kaya' ),
			'slug'  => 'button-background-color',
			'color' => '#111111',
		),
		array(
			'name'  => __( 'Button text color', 'kaya' ),
			'slug'  => 'button-text-color',
			'color' => '#eeeeee',
		),
	);
}

/**
 * Get the stored global colors, falling back to the defaults.
 *
 * @return array
 */
function kaya_get_global_colors() {
	$colors = get_theme_mod( 'kaya_global_colors', kaya_get_default_global_colors() );

	if ( ! is_array( $colors ) || empty( $colors ) ) {
		$colors = kaya_get_default_global_colors();
	}

	return $colors;
}

/**
 * Sanitize the global colors array coming from the Customizer.
 *
 * @param mixed $colors Raw value from the Customizer.
 * @return array
 */
function kaya_sanitize_global_colors( $colors ) {
	if ( ! is_array( $colors ) ) {
		return kaya_get_default_global_colors();
	}

	$clean = array();
	$seen  = array();

	foreach ( $colors as $index => $color ) {
		if ( ! is_array( $color ) || empty( $color['color'] ) ) {
			continue;
		}

		$hex = sanitize_hex_color( $color['color'] );

		if ( empty( $hex ) ) {
			continue;
		}

		$name = isset( $color['name'] ) ? sanitize_text_field( $color['name'] ) : '';
		$slug = isset( $color['slug'] ) && '' !== $color['slug'] ? $color['slug'] : $name;
		$slug = sanitize_title( $slug );

		if ( '' === $slug ) {
			continue;
		}

		// Force unique slugs. No DB calls in this loop.
		if ( isset( $seen[ $slug ] ) ) {
			$slug = $slug . '-' . $index;
		}
		$seen[ $slug ] = true;

		$clean[] = array(
			'name'  => '' !== $name ? $name : $slug,
			'slug'  => $slug,
			'color' => $hex,
		);
	}

	return ! empty( $clean ) ? $clean : kaya_get_default_global_colors();
}

/**
 * Register the Customizer section, setting, and control.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer manager.
 */
function kaya_global_colors_customize_register( $wp_customize ) {
	require_once get_template_directory() . '/inc/class-kaya-global-colors-control.php';

	$wp_customize->add_section(
		'kaya_global_colors_section',
		array(
			'title'    => __( 'Block Editor Global Colors', 'kaya' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'kaya_global_colors',
		array(
			'type'              => 'theme_mod',
			'default'           => kaya_get_default_global_colors(),
			'transport'         => 'refresh',
			'sanitize_callback' => 'kaya_sanitize_global_colors',
		)
	);

	$wp_customize->add_control(
		new Kaya_Global_Colors_Control(
			$wp_customize,
			'kaya_global_colors',
			array(
				'label'       => __( 'Global Colors', 'kaya' ),
				'description' => __( 'These colors appear in the block editor palette and as CSS variables. Add, edit, or remove colors below.', 'kaya' ),
				'section'     => 'kaya_global_colors_section',
				'settings'    => 'kaya_global_colors',
			)
		)
	);
}
add_action( 'customize_register', 'kaya_global_colors_customize_register' );

/**
 * Enqueue the Customizer control script and styles.
 */
function kaya_global_colors_enqueue_control() {
	wp_enqueue_script(
		'kaya-global-colors-customizer',
		get_template_directory_uri() . '/assets/js/global-colors-customizer.js',
		array( 'customize-controls' ),
		'3.3',
		true
	);

	wp_enqueue_style(
		'kaya-global-colors-customizer',
		get_template_directory_uri() . '/assets/css/global-colors-customizer.css',
		array(),
		'3.3'
	);
}
add_action( 'customize_controls_enqueue_scripts', 'kaya_global_colors_enqueue_control' );

/**
 * Register the palette with the block editor.
 *
 * Runs late on after_setup_theme so the stored theme mod is available.
 */
function kaya_register_global_colors_palette() {
	$colors  = kaya_get_global_colors();
	$palette = array();

	foreach ( $colors as $color ) {
		if ( empty( $color['color'] ) || empty( $color['slug'] ) ) {
			continue;
		}

		$palette[] = array(
			'name'  => isset( $color['name'] ) ? $color['name'] : $color['slug'],
			'slug'  => $color['slug'],
			'color' => $color['color'],
		);
	}

	if ( ! empty( $palette ) ) {
		add_theme_support( 'editor-color-palette', $palette );
	}
}
add_action( 'after_setup_theme', 'kaya_register_global_colors_palette', 20 );

/**
 * Build the :root CSS variables string for the global colors.
 *
 * @return string
 */
function kaya_global_colors_css() {
	$colors = kaya_get_global_colors();
	$vars   = '';

	foreach ( $colors as $color ) {
		if ( empty( $color['slug'] ) || empty( $color['color'] ) ) {
			continue;
		}

		// Slug is sanitize_title() and color is sanitize_hex_color(), so both are safe.
		$vars .= '--' . $color['slug'] . ':' . $color['color'] . ';';
	}

	return '' !== $vars ? ':root{' . $vars . '}' : '';
}

/**
 * Print the CSS variables on the front end.
 */
function kaya_print_global_colors_css() {
	$css = kaya_global_colors_css();

	if ( '' !== $css ) {
		echo '<style id="kaya-global-colors">' . $css . '</style>' . "\n"; // Values already sanitized.
	}
}
add_action( 'wp_head', 'kaya_print_global_colors_css', 5 );

/**
 * Make the CSS variables available inside the block editor.
 */
function kaya_enqueue_global_colors_editor_css() {
	$css = kaya_global_colors_css();

	if ( '' === $css ) {
		return;
	}

	wp_register_style( 'kaya-global-colors-editor', false, array(), '3.3' );
	wp_enqueue_style( 'kaya-global-colors-editor' );
	wp_add_inline_style( 'kaya-global-colors-editor', $css );
}
add_action( 'enqueue_block_editor_assets', 'kaya_enqueue_global_colors_editor_css' );

/**
 * Resolve a color for CSS output.
 *
 * Returns the per-element Customizer value when set, otherwise a reference to
 * the matching global color variable with a hard-coded fallback.
 *
 * @param string $mod      Per-element theme mod name.
 * @param string $slug     Global color slug to reference.
 * @param string $fallback Final fallback if the variable is undefined.
 * @return string
 */
function kaya_color( $mod, $slug, $fallback ) {
	$override = get_theme_mod( $mod, '' );

	if ( '' !== $override ) {
		return $override;
	}

	return sprintf( 'var(--%s, %s)', $slug, $fallback );
}

/**
 * Add the global colors as clickable swatches in every WP color picker.
 *
 * Targets the classic Iris picker used by WP_Customize_Color_Control. The block
 * editor picker is handled separately by the editor-color-palette support.
 */
function kaya_global_colors_picker_palette() {
	$colors = kaya_get_global_colors();
	$hexes  = array();

	foreach ( $colors as $color ) {
		if ( ! empty( $color['color'] ) ) {
			$hexes[] = $color['color'];
		}
	}

	if ( empty( $hexes ) ) {
		return;
	}

	wp_add_inline_script(
		'wp-color-picker',
		'jQuery.wp.wpColorPicker.prototype.options.palettes = ' . wp_json_encode( $hexes ) . ';'
	);
}
add_action( 'customize_controls_enqueue_scripts', 'kaya_global_colors_picker_palette' );
