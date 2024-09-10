/**
 * File accessibility.js.
 *
 * Handles accessibility controls for website.
 * 
 * @author  Anphira
 * @since 1.10
 * @package Kaya
 * @version 2.0
 */


/**
 * 
 * Show/hide accessibility options panel
 * 
 */
function kaya_show_a11y_options() {
	const show = document.getElementById( 'kaya-a11y-open' );
	const options = document.getElementById( 'kaya-a11y-options' );
	show.style.display = 'none';
	options.style.display = 'block';
}
function kaya_hide_a11y_options() {
	const show = document.getElementById( 'kaya-a11y-open' );
	const options = document.getElementById( 'kaya-a11y-options' );
	show.style.display = 'block';
	options.style.display = 'none';
}


/**
 * 
 * Font sizing
 * 
 */
function kaya_set_text_size(textSize) {

	document.body.classList.remove('text-size-small');
	document.body.classList.remove('text-size-large');
	document.body.classList.remove('text-size-xlarge');
	document.body.classList.remove('text-size-huge');

	switch (textSize) {
		case 'text-size-small':
			document.body.classList.add('text-size-small');
			break;
		case 'text-size-large':
			document.body.classList.add('text-size-large');
			break;
		case 'text-size-xlarge':
			document.body.classList.add('text-size-xlarge');
			break;
		case 'text-size-huge':
			document.body.classList.add('text-size-huge');
			break;
		default:
			break;
    }

	document.cookie = `kayaA11yTextSize=${textSize}; expires=${new Date(Date.now
	() + 30 * 24 * 60 * 60 * 1000)}; path=/`;
}


/**
 * 
 * Line heights
 * 
 */
function kaya_set_line_height(lineHeight) {
	document.body.classList.remove('line-height-1');
	document.body.classList.remove('line-height-125');
	document.body.classList.remove('line-height-15');
	document.body.classList.remove('line-height-175');
	document.body.classList.remove('line-height-2');

	switch (lineHeight) {
		case 'line-height-1':
			document.body.classList.add('line-height-1');
			break;
		case 'line-height-125':
			document.body.classList.add('line-height-125');
			break;
		case 'line-height-15':
			document.body.classList.add('line-height-15');
			break;
		case 'line-height-175':
			document.body.classList.add('line-height-175');
			break;
		case 'line-height-2':
			document.body.classList.add('line-height-2');
			break;
		default:
			break;
    }

	document.cookie = `kayaA11yLineHeight=${lineHeight}; expires=${new Date(Date.now
	() + 30 * 24 * 60 * 60 * 1000)}; path=/`;
}





/**
 * 
 * Font family changer
 * 
 */
function kaya_set_font_family(family) {
	document.body.classList.remove('font-arial');
	document.body.classList.remove('font-dyslexic');
	document.body.classList.remove('font-times');
	document.body.classList.remove('font-verdana');

	var fontFamily = 'font-' + family;

	switch (fontFamily) {
		case 'font-arial':
			document.body.classList.add('font-arial');
			break;
		case 'font-dyslexic':
			document.body.classList.add('font-dyslexic');
			break;
		case 'font-times':
			document.body.classList.add('font-times');
			break;
		case 'font-verdana':
			document.body.classList.add('font-verdana');
			break;
		default:
			break;
    }

	document.cookie = `kayaA11yFontFamily=${fontFamily}; expires=${new Date(Date.now
	() + 30 * 24 * 60 * 60 * 1000)}; path=/`;
}



/**
 * 
 * contrast changer
 * 
 */
function kaya_set_contrast(contrast) {
	if( contrast == 'white-bkgd-black-txt' ) {
		document.body.classList.add('white-bkgd-black-txt');
		document.body.classList.remove('black-bkgd-white-txt');
	} else if( contrast == 'black-bkgd-white-txt' ) {
		document.body.classList.remove('white-bkgd-black-txt');
		document.body.classList.add('black-bkgd-white-txt');
	} else {
		document.body.classList.remove('white-bkgd-black-txt');
		document.body.classList.remove('black-bkgd-white-txt');
	}

	document.cookie = `kayaA11yContrast=${contrast}; expires=${new Date(Date.now
	() + 30 * 24 * 60 * 60 * 1000)}; path=/`;
}



/**
 * 
 * enhance inputs
 * 
 */
function kaya_set_enhance_inputs(enhance) {
	if( enhance == 'on' ) {
		document.body.classList.add('enhance-inputs');
	} else {
		document.body.classList.remove('enhance-inputs');
		enhance = 'off';
	}

	document.cookie = `kayaA11yEnhanceInputs=${enhance}; expires=${new Date(Date.now
	() + 30 * 24 * 60 * 60 * 1000)}; path=/`;
}




/**
 * 
 * Load cookie values
 * 
 */
document.addEventListener("DOMContentLoaded", kaya_load_cookie_values);

function kaya_load_cookie_values() {
	// Get the value of the cookie
	let cookies = document.cookie.split(';');
	for (let i = 0; i < cookies.length; i++) {
		let cookie = cookies[i].trim();

		// set default state for font size
		let kaya_text_size = document.getElementById( 'kaya-text-size-default' );
		if(kaya_text_size) {
			kaya_text_size.setAttribute('checked', '');
		}

		// font size
		if( cookie.startsWith("kayaA11yTextSize") ) {
			let value = cookie.substring("kayaA11yTextSize=".length, cookie.length);
			document.body.classList.add(value);
			switch (value) {
				case 'default':
					document.getElementById( 'kaya-text-size-default' ).setAttribute( 'checked', '' );
					break;
				case 'text-size-small':
					document.getElementById( 'kaya-text-size-small' ).setAttribute( 'checked', '' );
					break;
				case 'text-size-large':
					document.getElementById( 'kaya-text-size-large' ).setAttribute( 'checked', '' );
					break;
				case 'text-size-xlarge':
					document.getElementById( 'kaya-text-size-xlarge' ).setAttribute( 'checked', '' );
					break;
				case 'text-size-huge':
					document.getElementById( 'kaya-text-size-huge' ).setAttribute( 'checked', '' );
					break;
				default: 
					document.getElementById( 'kaya-text-size-default' ).setAttribute( 'checked', '' );
					break;
			}
		}

		// set default state for line height
		let kaya_line_spacing = document.getElementById( 'kaya-line-spacing-default' );
		if(kaya_line_spacing) { 
			kaya_line_spacing.setAttribute('checked', '');
		}

		// line height
		if( cookie.startsWith("kayaA11yLineHeight") ) {
			let value = cookie.substring("kayaA11yLineHeight=".length, cookie.length);
			document.body.classList.add(value);
			switch (value) {
				case 'default':
					document.getElementById( 'kaya-line-spacing-default' ).setAttribute( 'checked', '' );
					break;
				case 'line-height-1':
					document.getElementById( 'kaya-line-spacing-1' ).setAttribute( 'checked', '' );
					break;
				case 'line-height-125':
					document.getElementById( 'kaya-line-spacing-125' ).setAttribute( 'checked', '' );
					break;
				case 'line-height-15':
					document.getElementById( 'kaya-line-spacing-15' ).setAttribute( 'checked', '' );
					break;
				case 'line-height-175':
					document.getElementById( 'kaya-line-spacing-175' ).setAttribute( 'checked', '' );
					break;
				case 'line-height-2':
					document.getElementById( 'kaya-line-spacing-2' ).setAttribute( 'checked', '' );
					break;
				default: 
					document.getElementById( 'kaya-line-spacing-default' ).setAttribute( 'checked', '' );
					break;
			}
		}

		// set default state for font family
		let kaya_font_family = document.getElementById( 'kaya-font-family-default' );
		if(kaya_font_family) {
			kaya_font_family.setAttribute('checked', '');
		}

		// font family
		if( cookie.startsWith("kayaA11yFontFamily") ) {
			let value = cookie.substring("kayaA11yFontFamily=".length, cookie.length);
			document.body.classList.add(value);
			switch (value) {
				case 'font-arial':
					document.getElementById( 'kaya-font-family-arial' ).setAttribute('checked', '');
					break;
				case 'font-default':
					document.getElementById( 'kaya-font-family-default' ).setAttribute('checked', '');
					break;
				case 'font-dyslexic':
					document.getElementById( 'kaya-font-family-dyslexic' ).setAttribute('checked', '');
					break;
				case 'font-times':
					document.getElementById( 'kaya-font-family-times' ).setAttribute('checked', '');
					break;
				case 'font-verdana':
					document.getElementById( 'kaya-font-family-verdana' ).setAttribute('checked', '');
					break;
				default:
					document.getElementById( 'kaya-font-family-default' ).setAttribute('checked', '');
					break;
			}
		}

		// set default state for contrast changer
		let kaya_contrast = document.getElementById( 'kaya-contrast-default' );
		if(kaya_contrast) {
			kaya_contrast.setAttribute('checked', '');
		}

		// contrast changer
		if( cookie.startsWith("kayaA11yContrast") ) {
			let value = cookie.substring("kayaA11yContrast=".length, cookie.length);
			if( value == 'white-bkgd-black-txt' || value == 'black-bkgd-white-txt' ) {
				document.body.classList.add(value);
				switch (value) {
					case 'white-bkgd-black-txt':
						document.getElementById( 'kaya-contrast-white-bkgd' ).setAttribute('checked', '');
						break;
					case 'black-bkgd-white-txt':
						document.getElementById( 'kaya-contrast-black-bkgd' ).setAttribute('checked', '');
						break;
					default:
						document.getElementById( 'kaya-contrast-default' ).setAttribute('checked', '');
						break;
				}
			}
		}

		// set default state for enhance inputs
		let kaya_enhance = document.getElementById( 'kaya-enhance-inputs-off' );
		if(kaya_enhance) {
			kaya_enhance.setAttribute('checked', '');
		}

		// enhance inputs
		if( cookie.startsWith("kayaA11yEnhanceInputs") ) {
			let value = cookie.substring("kayaA11yEnhanceInputs=".length, cookie.length);
			if(value == 'on') {
				document.body.classList.add('enhance-inputs');
				document.getElementById( 'kaya-enhance-inputs-on' ).setAttribute('checked', '');
			}
			if(value == 'off') {
				document.getElementById( 'kaya-enhance-inputs-off' ).setAttribute('checked', '');
			}
		}
	}
}