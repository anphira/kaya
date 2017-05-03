<?php
/**
 * Custom functions for Kaya theme.
 *
 * @package Kaya
 */

/**
 * Adds font options for theme.
 *
 * @returns The list of available fonts for theme
 */
function kaya_fonts_list() {
	$kaya_font_family_options = array(
		// web safe fonts
		'arial' => 'Arial, Helvetica, sans-serif',
		'helvetica' => 'Helvetica, sans-serif',
		'times' => 'Times New Roman, Times, serif',
		'courier' => 'Courier New, Courier, monospace',
		
		// Generally available
		'arial_black' => 'Arial Black, Gadget, sans-serif',
		'comic_sans' => 	'Comic Sans MS, Textile, cursive',
		'georgia' => 'Georgia, Times New Roman, Times, serif',
		'impact' => 'Impact, Charcoal, sans-serif',
		'tahoma' => 'Tahoma, Geneva, sans-serif',
		'trebuchet' => 'Trebuchet MS, Helvetica, sans-serif',
		'verdana' => 'Verdana, sans-serif',
		
		// Google fonts
		'abril_fatface' => 'Abril Fatface, cursive',
		'arvo' => 'Arvo, serif',
		'bitter' => 'Bitter, serif',
		'droid_sans' => '"Droid Sans", sans-serif',
		'droid_serif' => '"Droid Serif", serif',
		'josefin_slab' => '"Josefin Slab", serif',
		'lato' => 'Lato, sans-serif',
		'lora' => 'Lora, serif',
		'lobster' => 'Lobster, cursive',
		'merriweather' => 'Merriweather, serif',
		'montserrat' => 'Montserrat, sans-serif',
		'muli' => 'Muli, sans-serif',
		'oswald' => 'Oswald, sans-serif',
		'open_sans' => '"Open Sans", sans-serif',
		'pt_sans' => '"PT Sans", sans-serif',
		'raleway' => 'Raleway, sans-serif',
		'roboto' => 'Roboto, sans-serif',
		'roboto_condensed' => '"Roboto Condensed", sans-serif',
		'ubuntu' => 'Ubuntu, sans-serif',
		'vollkorn' => 'Vollkorn, serif',
	);

	return $kaya_font_family_options;
}

/**
 * Adds font options for theme.
 *
 * @returns The simple list of available fonts for theme
 */
function kaya_fonts_simple_list() {
	$kaya_font_family_options = array(
		// web safe fonts
		'arial',
		'helvetica',
		'times',
		'courier',
		
		// Generally available
		'arial_black',
		'comic_sans',
		'georgia',
		'impact',
		'tahoma',
		'trebuchet',
		'verdana',
		
		// Google fonts
		'abril_fatface',
		'arvo',
		'bitter',
		'droid_sans',
		'droid_serif',
		'josefin_slab',
		'lato',
		'lora',
		'lobster',
		'merriweather',
		'montserrat',
		'muli',
		'oswald',
		'open_sans',
		'pt_sans',
		'raleway',
		'roboto',
		'roboto_condensed',
		'ubuntu',
		'vollkorn',
	);

	return $kaya_font_family_options;
}


/**
 * Function to determine if font is from google
 *
 * @returns true if font is from google
 */
function kaya_is_font_from_google( $input_font ) {
	$google_fonts = array(
		'abril_fatface',
		'arvo',
		'bitter',
		'droid_sans',
		'droid_serif',
		'josefin_slab',
		'lato',
		'lora',
		'lobster',
		'merriweather',
		'montserrat',
		'muli',
		'oswald',
		'open_sans',
		'pt_sans',
		'raleway',
		'roboto',
		'roboto_condensed',
		'ubuntu',
		'vollkorn',
	);
	
	if( in_array( $input_font, $google_fonts) )
		return true;
	else
		return false;
}


/**
 * Function to lookup google include
 *
 * @returns string of google font link or empty string if neither font is from google
 */
function kaya_font_family_lookup( $input_font) {
	$font_list = kaya_fonts_list();
	 
	return $font_list[ $input_font ];
}


/**
 * Function to lookup google include
 *
 * @returns string of google font link or empty string if neither font is from google
 */
function kaya_font_lookup( $input_font) {
	$google_value = '';
	
	//make sure font is actually from google
	if ( kaya_is_font_from_google( $input_font ) ) {
		switch($input_font) {
			case 'abril_fatface':
				$google_value = 'Abril+Fatface';
				break;
			case 'arvo':
				$google_value = 'Arvo:400,400i,700';
				break;
			case 'bitter':
				$google_value = 'Bitter:400,400i,700';
				break;
			case 'droid_sans':
				$google_value = 'Droid+Sans:400,700';
				break;
			case 'droid_serif':
				$google_value = 'Droid+Serif:400,400i,700';
				break;
			case 'josefin_slab':
				$google_value = 'Josefin+Slab:400,400i,700';
				break;
			case 'lato':
				$google_value = 'Lato:400,400i,700';
				break;
			case 'lora':
				$google_value = 'Lora:400,400i,700';
				break;
			case 'lobster':
				$google_value = 'Lobster';
				break;
			case 'merriweather':
				$google_value = 'Merriweather:400,400i,700';
				break;
			case 'montserrat':
				$google_value = 'Montserrat:400,700';
				break;
			case 'muli':
				$google_value = 'Muli:400,400i,700';
				break;
			case 'oswald':
				$google_value = 'Oswald:400,700';
				break;
			case 'open_sans':
				$google_value = 'Open+Sans:400,400i,700';
				break;
			case 'pt_sans':
				$google_value = 'PT+Sans:400,400i,700';
				break;
			case 'raleway':
				$google_value = 'Raleway:400,400i,700';
				break;
			case 'roboto':
				$google_value = 'Roboto:400,400i,700';
				break;
			case 'roboto_condensed':
				$google_value = 'Roboto+Condensed:400,400i,700';
				break;
			case 'ubuntu':
				$google_value = 'Ubuntu:400,400i,700';
				break;
			case 'vollkorn':
				$google_value = 'Vollkorn:400,400i,700';
				break;
		}
	}
	
	return $google_value;
}
 

/**
 * Function for including google fonts
 *
 * @returns string of google font link or empty string if neither font is from google
 */
function kaya_build_fonts_from_google( $font1, $font2) {

	$custom_font = '';
	$font1_google = kaya_is_font_from_google( $font1 );
	$font2_google = kaya_is_font_from_google( $font2 );
	
	// if neither are google fonts, return the empty string
	if( ! ($font1_google) && ! ($font2_google) ) {
		return $custom_font;
	}
	
	// lookup fonts
	$lookup_1 = kaya_font_lookup($font1);
	$lookup_2 = kaya_font_lookup($font2);
	
	// if both are google we need to combine
	if( $font1_google && $font2_google ) {
		$custom_font = "<link href='https://fonts.googleapis.com/css?family=$lookup_1|$lookup_2' rel='stylesheet'>";
	}
	else {
		// only one is a google font
		if( $font1_google ) {
			$custom_font = "<link href='https://fonts.googleapis.com/css?family=$lookup_1' rel='stylesheet'>";
		}
		if( $font2_google ) {
			$custom_font = "<link href='https://fonts.googleapis.com/css?family=$lookup_2' rel='stylesheet'>";
		}
	}
	return $custom_font;
}


/**
 * Function for sanitizer callback on checkboxes
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function kaya_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * Function for sanitizer callback on fonts
 * 
 * Sanitization callback for theme included fonts. This callback sanitizes `$font`
 * and returns a valid theme supported font.
 *
 * @param string $font which is the user selected font.
 * @return string which is a valid theme support font.
 */
function kaya_sanitize_font( $font ) {
	// Font check
	$font_list = kaya_fonts_simple_list();
	if(in_array($font, $font_list))
		return $font;
	else 
		return 'arial';
}


/**
 * Function for sanitizer callback on header columns
 * 
 * Sanitization callback for theme included fonts. This callback sanitizes `$column`
 * and returns a valid theme supported column.
 *
 * @param string $column which is the user selected column.
 * @return string which is a valid theme support column.
 */
function kaya_sanitize_header_columns( $column ) {
	// Column check
	$valid_columns = array(
								'one_column',
								'two_column',
								'three_column',
								'four_column',
								'logo_menu',
								'logo_left_right_content',
							 );
	if(in_array($column, $valid_columns))
		return $column;
	else 
		return 'one_column';
}


/**
 * Function for sanitizer callback on footer columns
 * 
 * Sanitization callback for theme included fonts. This callback sanitizes `$column`
 * and returns a valid theme supported column.
 *
 * @param string $column which is the user selected column.
 * @return string which is a valid theme support column.
 */
function kaya_sanitize_footer_columns( $column ) {
	// Column check
	$valid_columns = array(
								'one_column',
								'two_column',
								'three_column',
								'four_column',
							 );
	if(in_array($column, $valid_columns))
		return $column;
	else 
		return 'one_column';
}


/**
 * Function for sanitizer callback on sidebars
 * 
 * Sanitization callback for theme included fonts. This callback sanitizes `$sidebar`
 * and returns a valid theme supported sidebar.
 *
 * @param string $column which is the user selected sidebar.
 * @return string which is a valid theme support sidebar.
 */
function kaya_sanitize_sidebars( $sidebar ) {
	// Sidebar check
	$valid_sidebar = array(
								'no_sidebar',
								'left_sidebar',
								'right_sidebar',
							 );
	if(in_array($sidebar, $valid_sidebar))
		return $sidebar;
	else 
		return 'no_sidebar';
}
