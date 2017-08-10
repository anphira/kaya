<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
 *	<?php if ( get_header_image() ) : ?>
 *	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
 *		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
 *	</a>
 *	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.4
 */

/**
 * Set up the WordPress core custom header feature.
 */
function kaya_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kaya_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'kaya_custom_header_setup' );

function kaya_customizer_settings() {
	
	if(get_theme_mod( 'kaya_custom_google_fonts_url' ) != '') 
		echo '<link href="', get_theme_mod( 'kaya_custom_google_fonts_url' ), '" rel="stylesheet">';
	else 
		echo kaya_build_fonts_from_google( get_theme_mod( 'kaya_heading_font' ), get_theme_mod( 'kaya_paragraph_font' ) );
	?>
<!-- Load Customizer CSS settings -->
<style>

html {
	background: <?php echo get_theme_mod( 'kaya_lower_footer_background_color' ) ?>;
}

#page {
	background-color: <?php echo get_theme_mod( 'kaya_background_color' ) ?>;
	<?php if (get_theme_mod( 'kaya_background_image_type' ) != 'dont_use') {
		echo "background-image: url(" , get_theme_mod( 'kaya_background_image' ), ");";
		switch(get_theme_mod( 'kaya_background_image_type' )) {
			case 'fix_to_bottom':
				echo 'background-position: bottom center;';
				echo 'background-repeat: no-repeat;';
				break;
			case 'fix_to_top':
				echo 'background-position: top center;';
				echo 'background-repeat: no-repeat;';
				break;
			case 'fixed_pos':
				echo 'background-attachment: fixed;';
				echo 'background-repeat: no-repeat;';
				break;
			case 'stretch':
				echo 'background-position: center;';
				echo 'background-size: 100%;';
				echo 'background-repeat: no-repeat;';
				break;
			case 'tile_image':
				echo 'background-repeat: repeat;';
				break;
			default:
				break;
		}
	} ?>
}

body, p, button, input, select, textarea {
	color: <?php echo get_theme_mod( 'kaya_text_color' ) ?>;
	font-weight: <?php echo get_theme_mod( 'kaya_paragraph_font_weight' ) ?>;
	font-family: 
		<?php if(get_theme_mod( 'kaya_custom_google_fonts_paragraph' ) != '')
			echo get_theme_mod( 'kaya_custom_google_fonts_paragraph' );
		else
			echo kaya_font_family_lookup( get_theme_mod( 'kaya_paragraph_font' ) ); ?>;
}
h1, h2, h3, h4, h5, h6 {
	color: <?php echo get_theme_mod( 'kaya_heading_color' ) ?>;
	font-weight: <?php echo get_theme_mod( 'kaya_heading_font_weight' ) ?>;
	font-family: 
		<?php if(get_theme_mod( 'kaya_custom_google_fonts_heading' ) != '')
			echo get_theme_mod( 'kaya_custom_google_fonts_heading' );
		else
			echo kaya_font_family_lookup( get_theme_mod( 'kaya_heading_font' ) ); ?>;
}
h1 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_1' ) ?>px;
}
h2 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_2' ) ?>px;
}
h3 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_3' ) ?>px;
}
h4 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_4' ) ?>px;
}
h5 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_5' ) ?>px;
}
h6 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_6' ) ?>px;
}
@media screen and (max-width: 767px) {
	h1 {
		font-size: <?php echo get_theme_mod( 'kaya_heading_1' ) * 0.67 ?>px;
	}
	h2 {
		font-size: <?php echo get_theme_mod( 'kaya_heading_2' ) * 0.67 ?>px;
	}
	h3 {
		font-size: <?php echo get_theme_mod( 'kaya_heading_3' ) * 0.67 ?>px;
	}
	h4 {
		font-size: <?php echo get_theme_mod( 'kaya_heading_4' ) * 0.67 ?>px;
	}
	h5 {
		font-size: <?php echo get_theme_mod( 'kaya_heading_5' ) * 0.67 ?>px;
	}
	h6 {
		font-size: <?php echo get_theme_mod( 'kaya_heading_6' ) * 0.67 ?>px;
	}
}
p, body {
	font-size: <?php echo get_theme_mod( 'kaya_paragraph' ) ?>px;
}
.social-icons .fa {
	background: <?php echo get_theme_mod( 'kaya_social_icon_background_color' ) ?>;
	font-size: <?php echo get_theme_mod( 'kaya_social_icon_size' ) ?>px;
}
.social-icons .fa:hover {
	background: <?php echo get_theme_mod( 'kaya_social_icon_color' ) ?>;
}
.social-icons .fa:before {
	font-size: <?php echo get_theme_mod( 'kaya_social_icon_size' ) ?>px;
	color: <?php echo get_theme_mod( 'kaya_social_icon_color' ) ?>;
}
.social-icons .fa:hover:before {
	color: <?php echo get_theme_mod( 'kaya_social_icon_background_color' ) ?>;
}
body a, body a:visited {
	color: <?php echo get_theme_mod( 'kaya_link_color' ) ?>;
}
body a:hover, body a:focus, body a:active {
	color: <?php echo get_theme_mod( 'kaya_link_hover_color' ) ?>;
}
#masthead {
	background: <?php if(get_theme_mod( 'kaya_transparent_header' ) == true) {
		echo 'transparent'; }
		else {
		echo get_theme_mod( 'kaya_header_background_color' ); } ?>;
}
#colophon {
	background: <?php echo get_theme_mod( 'kaya_footer_background_color' ) ?>;
}
#colophon, #colophon p {
	color: <?php echo get_theme_mod( 'kaya_footer_text_color' ) ?>;
}
#colophon a {
	color: <?php echo get_theme_mod( 'kaya_footer_link_color' ) ?>;
}
#colophon h3, #colophon h4, #colophon h5, #colophon h6 {
	color: <?php echo get_theme_mod( 'kaya_footer_heading_color' ) ?>;
}
#colophon .site-info, #colophon .site-info a, #colophon .site-info p {
	background: <?php echo get_theme_mod( 'kaya_lower_footer_background_color' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_lower_footer_text_color' ) ?>;
}
#masthead nav .page_item a, #masthead .menu-toggle {
	background: <?php echo get_theme_mod( 'kaya_menu_background_color' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_menu_text_color' ) ?>;
}
#masthead nav .page_item a:hover,
#masthead nav .page_item a:focus,
#masthead nav .page_item a:active, 
#masthead .menu-toggle:hover, 
#masthead .menu-toggle:focus, 
#masthead .menu-toggle:active {
	color: <?php echo get_theme_mod( 'kaya_menu_text_hover_color' ) ?>;
}
body button,
body button:visited,
body a.button, 
body a.button:visited, 
body input[type=button],
body input[type=reset],
body input[type=submit] {
	background: <?php echo get_theme_mod( 'kaya_button_color' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_button_text_color' ) ?>;
}
body button:active, 
body button:focus, 
body button:hover, 
body a.button:hover, 
body a.button:focus, 
body a.button:active, 
body input[type=button]:active, 
body input[type=button]:focus, 
body input[type=button]:hover, 
body input[type=reset]:active, 
body input[type=reset]:focus, 
body input[type=reset]:hover, 
body input[type=submit]:hover, 
body input[type=submit]:focus, 
body input[type=submit]:active {
	background: <?php echo get_theme_mod( 'kaya_button_hover_color' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_button_hover_text_color' ) ?>;
}

<?php 
$kaya_grid_width = get_theme_mod( 'kaya_grid_width' ); 
$kaya_grid_width = ($kaya_grid_width > 320) ? $kaya_grid_width : 1140;
?>
<?php if(get_theme_mod( 'kaya_content_in_grid' ) == true) { ?>
	#content, body .vc_row[data-vc-full-width="true"] > .wpb_column {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
<?php if(get_theme_mod( 'kaya_header_in_grid' ) == true) { ?>
	#masthead .container, nav .container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
<?php if(get_theme_mod( 'kaya_footer_in_grid' ) == true) { ?>
	#colophon .container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
.vc_row.vc_row-fluid, .footer-columns.container {
	max-width: <?php echo $kaya_grid_width; ?>px;
}



</style>
<!-- End Load Customizer CSS settings -->
<?php
	if(!empty(get_theme_mod( 'kaya_google_analytics' ))) {
		echo '<!-- Add Google Analytics -->';
		echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '", get_theme_mod( 'kaya_google_analytics' ), "', 'auto');";

  if(get_theme_mod('kaya_google_optimize') !== '') echo "ga('require', '", get_theme_mod( 'kaya_google_optimize' ), "');";
  
  echo "ga('send', 'pageview');

		</script>";
		echo '<!-- End Add Google Analytics -->';
	} 
 
}
add_action( 'wp_head', 'kaya_customizer_settings' );


