<?php
/**
 * Custom functions for Kaya theme.
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 2.0
 */


/**
 * Sanitize Callback for logo
 */
function kaya_sanitize_logo( $value ) {
    
    return $value;
}

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
		'georgia' => 'Georgia, Times New Roman, Times, serif',
		'tahoma' => 'Tahoma, Geneva, sans-serif',
		'trebuchet' => 'Trebuchet MS, Helvetica, sans-serif',
		'verdana' => 'Verdana, sans-serif',
		
		// Google fonts
		'abeezee' => 'ABeeZee, sans-serif',
		'arvo' => 'Arvo, serif',
		'bitter' => 'Bitter, serif',
		'cabin' => 'Cabin, sans-serif',
		'droid_sans' => '"Droid Sans", sans-serif',
		'droid_serif' => '"Droid Serif", serif',
		'exo' => 'Exo, sans-serif',
		'josefin_slab' => '"Josefin Slab", serif',
		'lato' => 'Lato, sans-serif',
		'lora' => 'Lora, serif',
		'merriweather' => 'Merriweather, serif',
		'merriweather_sans' => '"Merriweather Sans", sans-serif',
		'noto_sans' => '"Noto Sans", sans-serif',
		'nunito' => 'Nunito, sans-serif',
		'open_sans' => '"Open Sans", sans-serif',
		'poppins' => 'Poppins, sans-serif',
		'pt_sans' => '"PT Sans", sans-serif',
		'quicksand' => 'Quicksand, sans-serif',
		'raleway' => 'Raleway, sans-serif',
		'roboto' => 'Roboto, sans-serif',
		'roboto_slab' => '"Roboto Slab", sans-serif',
		'sen' => 'Sen, sans-serif',
		'ubuntu' => 'Ubuntu, sans-serif',
		'vollkorn' => 'Vollkorn, serif',
		'work_sans' => '"Work Sans", sans-serif',
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
		'georgia',
		'tahoma',
		'trebuchet',
		'verdana',
		
		// Google fonts
		'abeezee',
		'arvo',
		'bitter',
		'cabin',
		'droid_sans',
		'droid_serif',
		'exo',
		'josefin_slab',
		'lato',
		'lora',
		'merriweather',
		'merriweather_sans',
		'noto_sans',
		'nunito',
		'open_sans',
		'poppins',
		'pt_sans',
		'quicksand',
		'raleway',
		'roboto',
		'roboto_slab',
		'sen',
		'ubuntu',
		'vollkorn',
		'work_sans',
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
		'abeezee',
		'arvo',
		'bitter',
		'cabin',
		'droid_sans',
		'droid_serif',
		'exo',
		'josefin_slab',
		'lato',
		'lora',
		'merriweather',
		'merriweather_sans',
		'noto_sans',
		'nunito',
		'open_sans',
		'poppins',
		'pt_sans',
		'quicksand',
		'raleway',
		'roboto',
		'roboto_slab',
		'sen',
		'ubuntu',
		'vollkorn',
		'work_sans',
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
	if(!isset($input_font)) {
		$input_font = 'arial';
	}
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
			case 'abeezee':
				$google_value = 'ABeeZee:400,400i,700';
				break;
			case 'arvo':
				$google_value = 'Arvo:400,400i,700';
				break;
			case 'bitter':
				$google_value = 'Bitter:400,400i,700';
				break;
			case 'cabin':
				$google_value = 'Cabin:400,400i,700';
				break;
			case 'droid_sans':
				$google_value = 'Droid+Sans:400,700';
				break;
			case 'droid_serif':
				$google_value = 'Droid+Serif:400,400i,700';
				break;
			case 'exo':
				$google_value = 'Exo:400,400i,700';
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
			case 'merriweather':
				$google_value = 'Merriweather:400,400i,700';
				break;
			case 'merriweather_sans':
				$google_value = 'Merriweather+Sans:400,400i,700';
				break;
			case 'noto_sans':
				$google_value = 'Noto+Sans:400,700';
				break;
			case 'nunito':
				$google_value = 'Nunito:400,400i,700';
				break;
			case 'open_sans':
				$google_value = 'Open+Sans:400,400i,700';
				break;
			case 'poppins':
				$google_value = 'Poppins:400,400i,700';
				break;
			case 'pt_sans':
				$google_value = 'PT+Sans:400,400i,700';
				break;
			case 'quicksand':
				$google_value = 'Quicksand:400,400i,700';
				break;
			case 'raleway':
				$google_value = 'Raleway:400,400i,700';
				break;
			case 'roboto':
				$google_value = 'Roboto:400,400i,700';
				break;
			case 'roboto_slab':
				$google_value = 'Roboto+Slab:400,400i,700';
				break;
			case 'sen':
				$google_value = 'Sen:400,400i,700';
				break;
			case 'ubuntu':
				$google_value = 'Ubuntu:400,400i,700';
				break;
			case 'vollkorn':
				$google_value = 'Vollkorn:400,400i,700';
				break;
			case 'work_sans':
				$google_value = 'Work+Sans:400,400i,700';
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
 * Function for sanitizer callback on separator sections
 * 
 * Sanitization callback for 'separator' type controls. This callback sanitizes inputs by returning nothing.
 *
 * @param $value is ignored
 * @return nothing
 */
function kaya_sanitize_separator( $value ) {
	// Boolean check.
	return;
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
 * Sanitization callback for footer column options. This callback sanitizes `$column`
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
 * Function for sanitizer callback on background image
 * 
 * Sanitization callback for background image settings. This callback sanitizes `$option`
 * and returns a valid theme supported background setting.
 *
 * @param string $option which is the user selected option.
 * @return string which is a valid theme supported option.
 */
function kaya_sanitize_background_select( $option ) {
	// Background check
	$valid_options = array(
								'dont_use',
								'tile_image',
								'fix_to_top',
								'fix_to_bottom',
								'stretch',
								'fixed_pos',
							 );
	if(in_array($option, $valid_options))
		return $option;
	else 
		return 'dont_use';
}


/**
 * Function for sanitizer callback on sidebars
 * 
 * Sanitization callback for theme sidebar options. This callback sanitizes `$sidebar`
 * and returns a valid theme supported sidebar.
 *
 * @param string $sidebar which is the user selected sidebar.
 * @return string which is a valid theme support sidebar.
 */
function kaya_sanitize_sidebars( $sidebar ) {
	// Sidebar check
	$valid_sidebar = array(
								'no_sidebar',
								'left_sidebar',
								'right_sidebar',
							 );
	if(in_array($sidebar, $valid_sidebar)) {
		return $sidebar;
	}
	else  {
		return 'no_sidebar';
	}
}


/**
 * Function for sanitizer callback on social sharing options
 * 
 * Sanitization callback for theme social sharing options. This callback sanitizes `$social_sharing`
 * and returns a valid theme supported social sharing setting.
 *
 * @param string $social_sharing which is the user selected social sharing option.
 * @return string which is a valid theme support social sharing option.
 */
function kaya_sanitize_social_sharing( $social_sharing ) {
	// Social sharing check
	$valid_social_sharing = array(
								'no_sharing',
								'before_post_sharing',
								'after_post_sharing',
								'before_and_after_post_sharing'
							 );
	if(in_array($social_sharing, $valid_social_sharing)) {
		return $social_sharing;
	}
	else {
		return 'no_sharing';
	}
}

function kaya_display_social_sharing() {
	?>
	<div class="social-sharing-buttons">
		<p class="inline-block"><?php echo esc_html(get_theme_mod( 'kaya_social_sharing_text', 'Enjoy the article? Share it: ')); ?></p>

		<ul class="inline-block">
			<!-- Sharingbutton Facebook -->
			<?php if(get_theme_mod( 'kaya_social_sharing_facebook', false)) : ?>
			<li class="inline-block">
				<a class="resp-sharing-button__link resp-sharing-button--facebook" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" rel="noopener">
				  
				    <svg aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
				    Share on Facebook
				</a>
			</li>
			<?php endif; ?>

			<!-- Sharingbutton Twitter -->
			<?php if(get_theme_mod( 'kaya_social_sharing_twitter', false)) : ?>
			<li class="inline-block">
				<a class="resp-sharing-button__link resp-sharing-button--twitter" href="https://twitter.com/intent/tweet/?text=<?php echo urlencode(get_the_title()); ?>&amp;url=<?php echo urlencode(get_the_permalink()); ?>" rel="noopener">
				  
				    <svg aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
				    Share on X
				</a>
			</li>
			<?php endif; ?>

			<!-- Sharingbutton Pinterest -->
			<?php if(get_theme_mod( 'kaya_social_sharing_pinterest', false)) : ?>
			<li class="inline-block">
				<a class="resp-sharing-button__link resp-sharing-button--pinterest" href="https://pinterest.com/pin/create/button/?url=http%3A%2F%2Fsharingbuttons.io&amp;media=<?php echo urlencode(get_the_permalink()); ?>&amp;description=<?php echo urlencode(get_the_title()); ?>" rel="noopener">
				  
				    <svg aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z"/></svg>
				    Share on Pinterest
				</a>
			</li>
			<?php endif; ?>

			<!-- Sharingbutton LinkedIn -->
			<?php if(get_theme_mod( 'kaya_social_sharing_linkedin', false)) : ?>
			<li class="inline-block">
				<a class="resp-sharing-button__link resp-sharing-button--linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>&amp;summary=<?php echo urlencode(get_the_title()); ?>&amp;source=<?php echo urlencode(get_the_permalink()); ?>" rel="noopener">
				  
				    <svg aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z"/></svg>
				    Share on LinkedIn
				</a>
			</li>
			<?php endif; ?>

			<!-- Sharingbutton Reddit -->
			<?php if(get_theme_mod( 'kaya_social_sharing_reddit', false)) : ?>
			<li class="inline-block">
				<a class="resp-sharing-button__link resp-sharing-button--reddit" href="https://reddit.com/submit/?url=<?php echo urlencode(get_the_permalink()); ?>&amp;resubmit=true&amp;title=<?php echo urlencode(get_the_title()); ?>" rel="noopener">
				  
				    <svg aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 11.5c0-1.65-1.35-3-3-3-.96 0-1.86.48-2.42 1.24-1.64-1-3.75-1.64-6.07-1.72.08-1.1.4-3.05 1.52-3.7.72-.4 1.73-.24 3 .5C17.2 6.3 18.46 7.5 20 7.5c1.65 0 3-1.35 3-3s-1.35-3-3-3c-1.38 0-2.54.94-2.88 2.22-1.43-.72-2.64-.8-3.6-.25-1.64.94-1.95 3.47-2 4.55-2.33.08-4.45.7-6.1 1.72C4.86 8.98 3.96 8.5 3 8.5c-1.65 0-3 1.35-3 3 0 1.32.84 2.44 2.05 2.84-.03.22-.05.44-.05.66 0 3.86 4.5 7 10 7s10-3.14 10-7c0-.22-.02-.44-.05-.66 1.2-.4 2.05-1.54 2.05-2.84zM2.3 13.37C1.5 13.07 1 12.35 1 11.5c0-1.1.9-2 2-2 .64 0 1.22.32 1.6.82-1.1.85-1.92 1.9-2.3 3.05zm3.7.13c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm9.8 4.8c-1.08.63-2.42.96-3.8.96-1.4 0-2.74-.34-3.8-.95-.24-.13-.32-.44-.2-.68.15-.24.46-.32.7-.18 1.83 1.06 4.76 1.06 6.6 0 .23-.13.53-.05.67.2.14.23.06.54-.18.67zm.2-2.8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm5.7-2.13c-.38-1.16-1.2-2.2-2.3-3.05.38-.5.97-.82 1.6-.82 1.1 0 2 .9 2 2 0 .84-.53 1.57-1.3 1.87z"/></svg>
				    Share on Reddit
				</a>
			</li>
			<?php endif; ?>

			<!-- Sharingbutton E-Mail -->
			<?php if(get_theme_mod( 'kaya_social_sharing_email', false)) : ?>
			<li class="inline-block">
				<a class="resp-sharing-button__link resp-sharing-button--email" href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&amp;body=<?php echo urlencode(get_the_permalink()); ?>" rel="noopener">
				  
				    <svg aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z"/></svg>
				    Share by Email
				</a>
			</li>
			<?php endif; ?>
		</ul>

	</div>
	<?php
}

/**
 * Creating separators in WordPress customizer
 */
if ( ! class_exists( 'Kaya_Separator_Control' ) ) {
	return null;
}

/**
 * Class Kaya_Separator_Control
 *
 * Custom control to display separator
 */
class Kaya_Separator_Control extends WP_Customize_Control {
	public function render_content() {
		$input_id = '_customize-input-' . $this->id;
		if ( ! empty( $this->label ) ) : ?>
			<hr>
			<label style="background:#222;color:#eee;padding: 4px 8px;" for="<?php echo esc_attr( $input_id ); ?>" class="customize-control-title"><?php echo esc_html( $this->label ); ?></label>
		<?php endif; ?>
		<?php if ( ! empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
        <?php endif; ?>
		<?php if( empty( $this->description ) && empty( $this->label ) ) : ?>
			<label> <br><hr><br> </label>
		<?php endif;
	}
}


/**
 * Kaya Logo Display
 */
function kaya_logo_display() {
	echo '<div class="site-branding">';
		if ( get_theme_mod( 'kaya_logo', false ) ) :
			echo '<a href="',  esc_url( home_url() )  , '">';
			$kaya_alt = esc_attr( get_bloginfo( 'name', 'display' ) );
			$kaya_logo = esc_url(get_theme_mod( 'kaya_logo' ));
			$width = get_theme_mod( 'kaya_logo_width', '' );
			$height = get_theme_mod( 'kaya_logo_height', '' );
			echo '<img src="' . esc_url($kaya_logo) . '" alt="' . esc_html($kaya_alt) . '" width="' . esc_html($width) . '" height="' . esc_html($height) . '">';
			echo '</a>';
		else :
			echo '<h3 class="site-title"><a href="',  esc_url( home_url() )  , '">' , esc_html(bloginfo( 'name' )) , '</a></h3>';
		endif;
	echo '</div><!-- .site-branding -->';
}



/**
 * Load fonts & colors from customizer into Gutenberg
 */
function kaya_custom_styling() {
	$style_string = '<style>';
	$style_string .= 'body .editor-styles-wrapper,
	body .editor-styles-wrapper p {';
	$style_string .= 'color: ' . esc_html(get_theme_mod( 'kaya_text_color', '#000000' )) . ';';
	$style_string .= 'font-weight: ' . esc_html(get_theme_mod( 'kaya_paragraph_font_weight', '400' )) . ';';
	$style_string .= 'line-height: ' . esc_html(get_theme_mod( 'kaya_paragraph_line_height', '1.5' )) . ';';
	$style_string .= 'font-family:';
		if(get_theme_mod( 'kaya_custom_google_fonts_paragraph', '' ) != '')
			$style_string .=  esc_html(get_theme_mod( 'kaya_custom_google_fonts_paragraph' ));
		else
			$style_string .=  kaya_font_family_lookup( esc_html(get_theme_mod( 'kaya_paragraph_font', 'verdana' )) );
    $style_string .=  ';'; 
	$style_string .= '}';
    $style_string .= 'html body .editor-styles-wrapper h1,
    html body .editor-styles-wrapper h2,
    html body .editor-styles-wrapper h3,
    html body .editor-styles-wrapper h4,
    html body .editor-styles-wrapper h5,
    html body .editor-styles-wrapper h6 {';
    $style_string .= 'color: ' . esc_html(get_theme_mod( 'kaya_heading_color', '#000000' )) . ';';
	$style_string .= 'font-weight: ' . esc_html(get_theme_mod( 'kaya_heading_font_weight', '400' )) . ';';
	$style_string .= 'font-family:';
		if(get_theme_mod( 'kaya_custom_google_fonts_heading', '' ) != '')
			$style_string .=  esc_html(get_theme_mod( 'kaya_custom_google_fonts_heading' ));
		else
			$style_string .=  kaya_font_family_lookup( esc_html(get_theme_mod( 'kaya_heading_font', 'verdana' )) );
    $style_string .=  ';}'; 
    $style_string .= '</style>';

  echo $style_string;
}



/**
 * 
 * Calculate reading time of blog post
 * 
 */
function kaya_reading_time() {
	$words = str_word_count( wp_strip_all_tags( get_the_content() ) );
	$reading_time = ceil($words/250);
	return $reading_time;
}