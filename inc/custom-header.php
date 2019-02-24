<?php
/**
 * Customizations for CSS from theme options
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.7.11
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
	
	if( '' != get_theme_mod( 'kaya_custom_google_fonts_url', '' )) 
		echo '<link href="', get_theme_mod( 'kaya_custom_google_fonts_url' ), '" rel="stylesheet">';
	else 
		echo kaya_build_fonts_from_google( get_theme_mod( 'kaya_heading_font', 'arial' ), get_theme_mod( 'kaya_paragraph_font', 'arial' ) );
	?>
<!-- Load Customizer CSS settings -->
<style>

html {
	background: <?php echo get_theme_mod( 'kaya_lower_footer_background_color', '#000000' ) ?>;
}

#page {
	background-color: <?php echo get_theme_mod( 'kaya_background_color', '#ffffff' ) ?>;
	<?php if (get_theme_mod( 'kaya_background_image_type', 'dont_use' ) != 'dont_use') {
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
	color: <?php echo get_theme_mod( 'kaya_text_color', '#000000' ) ?>;
	font-weight: <?php echo get_theme_mod( 'kaya_paragraph_font_weight', '400' ) ?>;
	font-family: 
		<?php if(get_theme_mod( 'kaya_custom_google_fonts_paragraph', '' ) != '')
			echo get_theme_mod( 'kaya_custom_google_fonts_paragraph' );
		else
			echo kaya_font_family_lookup( get_theme_mod( 'kaya_paragraph_font', 'arial' ) ); ?>;
}
h1, h2, h3, h4, h5, h6 {
	color: <?php echo get_theme_mod( 'kaya_heading_color', '#000000' ) ?>;
	font-weight: <?php echo get_theme_mod( 'kaya_heading_font_weight', '400' ) ?>;
	font-family: 
		<?php if(get_theme_mod( 'kaya_custom_google_fonts_heading', '' ) != '')
			echo get_theme_mod( 'kaya_custom_google_fonts_heading' );
		else
			echo kaya_font_family_lookup( get_theme_mod( 'kaya_heading_font', 'arial' ) ); ?>;
}
h1, .h1 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_1', '36' ) ?>px;
}
h2, .h2 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_2', '27' ) ?>px;
}
h3, .h3 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_3', '21' ) ?>px;
}
h4, .h4 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_4', '18' ) ?>px;
}
h5, .h5 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_5', '16' ) ?>px;
}
h6, .h6 {
	font-size: <?php echo get_theme_mod( 'kaya_heading_6', '16' ) ?>px;
}
@media screen and (max-width: 767px) {
	<?php 
		$kaya_heading_1 = get_theme_mod( 'kaya_heading_1', '36' );
		$kaya_heading_2 = get_theme_mod( 'kaya_heading_2', '27' );
		$kaya_heading_3 = get_theme_mod( 'kaya_heading_3', '21' );
		$kaya_heading_4 = get_theme_mod( 'kaya_heading_4', '18' );
		$kaya_heading_5 = get_theme_mod( 'kaya_heading_5', '16' );
		$kaya_heading_6 = get_theme_mod( 'kaya_heading_6', '16' );
	?>
	h1 {
		font-size: <?php echo $kaya_heading_1 * 0.67 ?>px;
	}
	h2 {
		font-size: <?php echo $kaya_heading_2 * 0.67 ?>px;
	}
	h3 {
		font-size: <?php echo $kaya_heading_3 * 0.75 ?>px;
	}
	h4 {
		font-size: <?php echo $kaya_heading_4 * 0.8 ?>px;
	}
	h5 {
		font-size: <?php echo $kaya_heading_5 * 0.9 ?>px;
	}
	h6 {
		font-size: <?php echo $kaya_heading_6 * 0.9 ?>px;
	}
}
p, body {
	font-size: <?php echo get_theme_mod( 'kaya_paragraph', '16' ) ?>px;
}
.social-icons .fa {
	background: <?php echo get_theme_mod( 'kaya_social_icon_background_color', '#000000' ) ?>;
	font-size: <?php echo get_theme_mod( 'kaya_social_icon_size', '18' ) ?>px;
}
.social-icons .fa:hover {
	background: <?php echo get_theme_mod( 'kaya_social_icon_color', '#ffffff' ) ?>;
}
.social-icons .fa:before {
	font-size: <?php echo get_theme_mod( 'kaya_social_icon_size', '18' ) ?>px;
	color: <?php echo get_theme_mod( 'kaya_social_icon_color', '#ffffff' ) ?>;
}
.social-icons .fa:hover:before {
	color: <?php echo get_theme_mod( 'kaya_social_icon_background_color', '#000000' ) ?>;
}
body a, body a:visited {
	color: <?php echo get_theme_mod( 'kaya_link_color', '#008dc4' ) ?>;
}
body a:hover, body a:focus, body a:active {
	color: <?php echo get_theme_mod( 'kaya_link_hover_color', '#005dc4' ) ?>;
}
#masthead {
	background: <?php if(get_theme_mod( 'kaya_transparent_header', false ) == true) {
		echo 'transparent'; }
		else {
		echo get_theme_mod( 'kaya_header_background_color', '#ffffff' ); } ?>;
}
#colophon {
	background: <?php echo get_theme_mod( 'kaya_footer_background_color', '#ffffff' ) ?>;
}
#colophon, #colophon p {
	color: <?php echo get_theme_mod( 'kaya_footer_text_color', '#000000' ) ?>;
}
#colophon a {
	color: <?php echo get_theme_mod( 'kaya_footer_link_color', '#000080' ) ?>;
}
#colophon h3, #colophon h4, #colophon h5, #colophon h6 {
	color: <?php echo get_theme_mod( 'kaya_footer_heading_color', '#000000' ) ?>;
}
#colophon .site-info, #colophon .site-info a, #colophon .site-info p {
	background: <?php echo get_theme_mod( 'kaya_lower_footer_background_color', '#000000' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_lower_footer_text_color', '#ffffff' ) ?>;
}
#masthead #site-navigation .menu-item a, #masthead .menu-toggle, #masthead #site-navigation {
	background: <?php echo get_theme_mod( 'kaya_menu_background_color', '#ffffff' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_menu_text_color', '#008dc4' ) ?>;
}
#page-hero-area {
	<?php
	if(is_home()) {
		$page_for_posts = get_option( 'page_for_posts' );
		$page_hero_background_color = get_post_meta($page_for_posts, '_kaya_page_hero_header_color', true);
		$page_hero_background_image = get_post_meta($page_for_posts, '_kaya_page_hero_image', true);
		$page_hero_background_setting = get_post_meta($page_for_posts, 'kaya_page_hero_background_setting', true);
	}
	else {
		$page_hero_background_color = get_post_meta(get_the_ID(), '_kaya_page_hero_header_color', true);
		$page_hero_background_image = get_post_meta(get_the_ID(), '_kaya_page_hero_image', true);
		$page_hero_background_setting = get_post_meta(get_the_ID(), 'kaya_page_hero_background_setting', true);
	}
	switch ($page_hero_background_setting ) {
		case 'dont_use':
			break;
		case 'tile_image':
			break;
		case 'fix_to_top':
			break;
		case 'fix_to_bottom':
			break;
		case 'stretch':
			break;
		case 'fixed_pos':
			break;
		case 'use_page_default':
			$page_hero_background_setting = get_theme_mod('kaya_page_hero_background_image_type');
			$page_hero_background_color = get_theme_mod('kaya_page_hero_background_color');
			$page_hero_background_image = get_theme_mod('kaya_page_hero_background_image');
			break;
		default: 
			$page_hero_background_setting = get_theme_mod('kaya_page_hero_background_image_type');
			$page_hero_background_color = get_theme_mod('kaya_page_hero_background_color');
			$page_hero_background_image = get_theme_mod('kaya_page_hero_background_image');
	}
	switch($page_hero_background_setting) {
		case 'dont_use':
			echo 'background: '. $page_hero_background_color .';';
			break;
		case 'tile_image':
			echo 'background: url('. $page_hero_background_image .') repeat;';
			break;
		case 'fix_to_top':
			echo 'background: url('. $page_hero_background_image .') no-repeat center top;';
			break;
		case 'fix_to_bottom':
			echo 'background: url('. $page_hero_background_image .') no-repeat center bottom;';
			break;
		case 'stretch':
			echo 'background: url('. $page_hero_background_image .') no-repeat;';
			echo 'background-size: cover;';
			break;
		case 'fixed_pos':
			echo 'background: url('. $page_hero_background_image .') no-repeat center;';
			echo 'background-attachment: fixed;';
			break;
	} ?>
}
#masthead #site-navigation .menu-item a:hover,
#masthead #site-navigation .menu-item a:focus,
#masthead #site-navigation .menu-item a:active, 
#masthead .menu-toggle:hover, 
#masthead .menu-toggle:focus, 
#masthead .menu-toggle:active {
	color: <?php echo get_theme_mod( 'kaya_menu_text_hover_color', '#008dc4' ) ?>;
}
body button,
body button:visited,
body a.button,
body.woocommerce a.button,
body.woocommerce a.button:visited,
body .woocommerce a.button,
body .woocommerce a.button:visited,
body a.button:visited, 
body input[type=button],
body input[type=reset],
body input[type=submit] {
	background: <?php echo get_theme_mod( 'kaya_button_color', '#008dc4' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_button_text_color', '#ffffff' ) ?>;
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
	background: <?php echo get_theme_mod( 'kaya_button_hover_color', '#005dc4' ) ?>;
	color: <?php echo get_theme_mod( 'kaya_button_hover_text_color', '#000000' ) ?>;
}

<?php 
$kaya_grid_width = get_theme_mod( 'kaya_grid_width', '1140' ); 
$kaya_grid_width = ($kaya_grid_width > 320) ? $kaya_grid_width : 1140;
?>
<?php if(get_theme_mod( 'kaya_content_in_grid', false )) { ?>
	#content, body .vc_row[data-vc-full-width="true"] > .wpb_column, #page-hero-area .container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
<?php if(get_theme_mod( 'kaya_header_in_grid', false )) { ?>
	#masthead .container, nav .container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
<?php if(get_theme_mod( 'kaya_footer_in_grid', false )) { ?>
	#colophon .container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
:not(.normal-width) .vc_row.vc_row-fluid, .footer-columns.container {
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

  if(get_theme_mod('kaya_google_optimize', '') !== '') echo "ga('require', '", get_theme_mod( 'kaya_google_optimize' ), "');";
  
  echo "ga('send', 'pageview');

		</script>";
		echo '<!-- End Add Google Analytics -->';
	} 

	/* Tag manager option */
	if(!empty(get_theme_mod( 'kaya_google_tag_analytics' ))) {
		echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
		echo '<script async src="https://www.googletagmanager.com/gtag/js?id=';
		echo get_theme_mod( 'kaya_google_tag_analytics' );
		echo '"></script>';
		echo "<script>
			window.dataLayer = window.dataLayer || [];
		 	function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

		 	gtag('config', '";
		 echo get_theme_mod( 'kaya_google_tag_analytics' );
		 echo "');
		</script>";
		echo '<!-- End Global site tag (gtag.js) - Google Analytics -->';
	} 
 
}
add_action( 'wp_head', 'kaya_customizer_settings' );


