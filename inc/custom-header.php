<?php
/**
 * Customizations for CSS from theme options
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 2.4
 */

/**
 * Set up the WordPress core custom header feature.
 */
function kaya_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kaya_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '181818',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'kaya_custom_header_setup' );

function kaya_customizer_settings() {
	
	if( '' != get_theme_mod( 'kaya_custom_google_fonts_url', '' )) {
		echo '<link href="', get_theme_mod( 'kaya_custom_google_fonts_url' ), '" rel="stylesheet">';
	}
	elseif(!get_theme_mod( 'kaya_disable_google_fonts', false )) {
		echo kaya_build_fonts_from_google( get_theme_mod( 'kaya_heading_font', 'verdana' ), get_theme_mod( 'kaya_paragraph_font', 'verdana' ) );
	}
	?>
<!-- Load Customizer CSS settings -->
<style>

html {
	background: <?php echo esc_html(get_theme_mod( 'kaya_lower_footer_background_color', '#181818' )) ?>;
}

#page {
	background-color: <?php echo esc_html(get_theme_mod( 'kaya_background_color', '#ffffff' )) ?>;
	<?php if (get_theme_mod( 'kaya_background_image_type', 'dont_use' ) != 'dont_use') {
		echo "background-image: url(" , esc_url(get_theme_mod( 'kaya_background_image' )), ");";
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

#masthead .announcement-bar {
	background: <?php echo esc_html(get_theme_mod( 'kaya_announcement_background_color', '#555555' )); ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_announcement_text_color', '#ffffff' )); ?>;
}
#masthead .announcement-button,
#masthead .announcement-button:visited {
	background: <?php echo esc_html(get_theme_mod( 'kaya_announcement_button_background_color', '#181818' )); ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_announcement_button_text_color', '#ffffff' )); ?>;
	border-color: <?php echo esc_html(get_theme_mod( 'kaya_announcement_button_background_color', '#181818' )); ?>;
}
#masthead .announcement-button:hover,
#masthead .announcement-button:active {
	background: <?php echo esc_html(get_theme_mod( 'kaya_announcement_button_text_color', '#ffffff' )); ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_announcement_button_background_color', '#181818' )); ?>;
	border-color: <?php echo esc_html(get_theme_mod( 'kaya_announcement_button_text_color', '#ffffff' )); ?>;
}

body, p, button, input, select, textarea, .elementor-widget-text-editor,
body.woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button {
	color: <?php echo esc_html(get_theme_mod( 'kaya_text_color', '#181818' )) ?>;
	font-weight: <?php echo esc_html(get_theme_mod( 'kaya_paragraph_font_weight', '400' )) ?>;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_paragraph_line_height', '1.5' )) ?>;
	letter-spacing: <?php echo esc_html(get_theme_mod( 'kaya_paragraph_letter_spacing', '0' )); ?>px;
	font-family: 
		<?php if(get_theme_mod( 'kaya_custom_google_fonts_paragraph', '' ) != '')
			echo esc_html(get_theme_mod( 'kaya_custom_google_fonts_paragraph' ));
		else
			echo kaya_font_family_lookup( esc_html(get_theme_mod( 'kaya_paragraph_font', 'verdana' )) ); ?>;
}
input[type=color], input[type=date], input[type=datetime-local], input[type=datetime], input[type=email], input[type=month], input[type=number], input[type=password], input[type=range], input[type=search], input[type=tel], input[type=text], input[type=time], input[type=url], input[type=week], textarea, select {
	border-color: <?php echo esc_html(get_theme_mod( 'kaya_input_border_color', '#777' )) ?>;
}
h1, h2, h3, h4, h5, h6 {
	color: <?php echo esc_html(get_theme_mod( 'kaya_heading_color', '#181818' )); ?>;
	font-weight: <?php echo esc_html(get_theme_mod( 'kaya_heading_font_weight', '400' )); ?>;
	letter-spacing: <?php echo esc_html(get_theme_mod( 'kaya_heading_letter_spacing', '0' )); ?>px;
	font-family: 
		<?php if(get_theme_mod( 'kaya_custom_google_fonts_heading', '' ) != '')
			echo '"' . esc_html(get_theme_mod( 'kaya_custom_google_fonts_heading' )) . '"';
		else
			echo kaya_font_family_lookup( esc_html(get_theme_mod( 'kaya_heading_font', 'verdana' )) ); ?>;
}
h1, .h1, .elementor-widget-heading h1.elementor-heading-title, body .h1.elementor-widget-heading .elementor-heading-title {
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_heading_1', '2' )) ?>rem;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_heading_1_line_height', '1.5' )) ?>;
}
h2, .h2, .elementor-widget-heading h2.elementor-heading-title, body .h2.elementor-widget-heading .elementor-heading-title {
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_heading_2', '1.8' )) ?>rem;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_heading_2_line_height', '1.5' )) ?>;
}
h3, .h3, .elementor-widget-heading h3.elementor-heading-title, body .h3.elementor-widget-heading .elementor-heading-title {
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_heading_3', '1.6' )) ?>rem;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_heading_3_line_height', '1.5' )) ?>;
}
h4, .widget-title, .h4, .elementor-widget-heading h4.elementor-heading-title, body .h4.elementor-widget-heading .elementor-heading-title {
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_heading_4', '1.4' )) ?>rem;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_heading_4_line_height', '1.5' )) ?>;
}
h5, .h5, .elementor-widget-heading h5.elementor-heading-title, body .h5.elementor-widget-heading .elementor-heading-title {
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_heading_5', '1.25' )) ?>rem;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_heading_5_line_height', '1.5' )) ?>;
}
h6, .h6, .elementor-widget-heading h6.elementor-heading-title, body .h6.elementor-widget-heading .elementor-heading-title {
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_heading_6', '1.15' )) ?>rem;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_heading_6_line_height', '1.5' )) ?>;
}
@media screen and (max-width: 767px) {
	<?php 
		$kaya_heading_1 = (float) esc_html(get_theme_mod( 'kaya_heading_1', '2' ));
		$kaya_heading_2 = (float) esc_html(get_theme_mod( 'kaya_heading_2', '1.8' ));
		$kaya_heading_3 = (float) esc_html(get_theme_mod( 'kaya_heading_3', '1.6' ));
		$kaya_heading_4 = (float) esc_html(get_theme_mod( 'kaya_heading_4', '1.4' ));
		$kaya_heading_5 = (float) esc_html(get_theme_mod( 'kaya_heading_5', '1.25' ));
		$kaya_heading_6 = (float) esc_html(get_theme_mod( 'kaya_heading_6', '1.15' ));
	?>
	h1, .h1, .elementor-widget-heading h1.elementor-heading-title {
		font-size: <?php echo $kaya_heading_1 * 0.7 ?>rem;
	}
	h2, .h2, .elementor-widget-heading h2.elementor-heading-title {
		font-size: <?php echo $kaya_heading_2 * 0.75 ?>rem;
	}
	h3, .h3, .elementor-widget-heading h3.elementor-heading-title {
		font-size: <?php echo $kaya_heading_3 * 0.8 ?>rem;
	}
	h4, .h4, .elementor-widget-heading h4.elementor-heading-title {
		font-size: <?php echo $kaya_heading_4 * 0.9 ?>rem;
	}
	h5, .h5, .elementor-widget-heading h5.elementor-heading-title {
		font-size: <?php echo $kaya_heading_5 * 0.9 ?>rem;
	}
	h6, .h6, .elementor-widget-heading h6.elementor-heading-title {
		font-size: <?php echo $kaya_heading_6 * 0.9 ?>rem;
	}
}
body,
body .elementor-button {
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_paragraph', '1' )) ?>rem;
}
.social-icons .fab,
.social-icons .fas {
	background: <?php echo esc_html(get_theme_mod( 'kaya_social_icon_background_color', '#181818' )) ?>;
	font-size: <?php echo esc_html(get_theme_mod( 'kaya_social_icon_size', '1.1' )) ?>rem;
}
.social-icons .fab:hover,
.social-icons .fas:hover {
	background: <?php echo esc_html(get_theme_mod( 'kaya_social_icon_color', '#ffffff' )) ?>;
}
.social-icons .fab:before,
.social-icons .fas:before  {
	color: <?php echo esc_html(get_theme_mod( 'kaya_social_icon_color', '#ffffff' )) ?>;
}
.social-icons .fab:hover:before,
.social-icons .fas:hover:before {
	color: <?php echo esc_html(get_theme_mod( 'kaya_social_icon_background_color', '#181818' )) ?>;
}
body a, body a:visited {
	color: <?php echo esc_html(get_theme_mod( 'kaya_link_color', '#0075a5' )) ?>;
}
body a:hover, body a:active {
	color: <?php echo esc_html(get_theme_mod( 'kaya_link_hover_color', '#005dc4' )) ?>;
}
#masthead {
	background: <?php if(get_theme_mod( 'kaya_transparent_header', false ) == true) {
		echo 'transparent'; }
		else {
		echo esc_html(get_theme_mod( 'kaya_header_background_color', '#ffffff' )); } ?>;
}
.top-header {
	background: <?php echo esc_html(get_theme_mod( 'kaya_top_bar_background_color', '#ffffff' )); ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_top_bar_text_color', '#ffffff' )); ?>;
}
.top-header p,
.top-header a,
.top-header a:visited,
.top-header a:hover {
	color: <?php echo esc_html(get_theme_mod( 'kaya_top_bar_text_color', '#ffffff' )); ?>;
}
#colophon {
	background: <?php echo esc_html(get_theme_mod( 'kaya_footer_background_color', '#ffffff' )) ?>;
}
#colophon, #colophon p {
	color: <?php echo esc_html(get_theme_mod( 'kaya_footer_text_color', '#181818' )) ?>;
}
#colophon a:not(.social-icon-single) {
	color: <?php echo esc_html(get_theme_mod( 'kaya_footer_link_color', '#000080' )) ?>;
}
#colophon h2, #colophon h3, #colophon h4, #colophon h5, #colophon h6 {
	color: <?php echo esc_html(get_theme_mod( 'kaya_footer_heading_color', '#181818' )) ?>;
}
#colophon .site-info, #colophon .site-info p {
	background: <?php echo esc_html(get_theme_mod( 'kaya_lower_footer_background_color', '#181818' )) ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_lower_footer_text_color', '#ffffff' )) ?>;
}
#colophon .site-info a,
#colophon .site-info a:visited {
	color: <?php echo esc_html(get_theme_mod( 'kaya_lower_footer_link_color', '#ffffff' )) ?>;
}
#colophon .site-info a:hover,
#colophon .site-info a:active {
	color: <?php echo esc_html(get_theme_mod( 'kaya_lower_footer_link_hover_color', '#ffffff' )) ?>;
}
#masthead #site-navigation a, #masthead .menu-toggle, #masthead #site-navigation, .main-navigation ul ul {
	background: <?php echo esc_html(get_theme_mod( 'kaya_menu_background_color', '#ffffff' )) ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_menu_text_color', '#0075a5' )) ?>;
}
#masthead #site-navigation a:hover,
#masthead #site-navigation a:active {
	color: <?php echo esc_html(get_theme_mod( 'kaya_menu_background_color', '#ffffff' )) ?>;
	background: <?php echo esc_html(get_theme_mod( 'kaya_menu_text_color', '#0075a5' )) ?>;
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
	color: <?php echo esc_html(get_theme_mod( 'kaya_menu_text_hover_color', '#0075a5' )) ?>;
}
body .ff-default .ff-el-form-control {
	<?php if( esc_html(get_theme_mod( 'kaya_border_radius', '' )) != '' ) { ?>
		border-radius: <?php echo esc_html(get_theme_mod( 'kaya_border_radius', '0' )) ?>px;
	<?php } ?>
}
body button,
body button:visited,
body a.button,
body a.button:visited, 
body input[type=button],
body input[type=reset],
body input[type=submit],
body .elementor-button,
body .elementor-button.elementor-size-sm,
body .elementor-button.elementor-size-md,
body .elementor-button.elementor-size-lg,
body .elementor-button:visited,
body .wp-block-button__link,
body .wp-block-button__link:visited,
body #colophon .wp-block-button__link,
body #colophon .wp-block-button__link:visited,
body .fluentform .ff_upload_btn.ff-btn,
body form.frm-fluent-form .ff-btn-submit:not(.ff_btn_no_style),
body form.frm-fluent-form .ff-btn-submit {
	background: <?php echo esc_html(get_theme_mod( 'kaya_button_color', '#0075a5' )) ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_button_text_color', '#ffffff' )) ?>;
	border-color: <?php echo esc_html(get_theme_mod( 'kaya_button_border_color', '#005dc4' )) ?>;
	border-width: <?php echo esc_html(get_theme_mod( 'kaya_border_width', '0' )) ?>px;
	<?php if( esc_html(get_theme_mod( 'kaya_border_radius', '' )) != '' ) { ?>
		border-radius: <?php echo esc_html(get_theme_mod( 'kaya_border_radius', '0' )) ?>px;
	<?php } ?>
	border-style: solid;
	line-height: <?php echo esc_html(get_theme_mod( 'kaya_paragraph_line_height', '1.5' )) ?>;
	font-weight: <?php echo esc_html(get_theme_mod( 'kaya_paragraph_font_weight', '400' )) ?>;
}
body .resp-sharing-button__link {
	border-radius: <?php echo esc_html(get_theme_mod( 'kaya_border_radius', '0' )) ?>px;
}
body button:active, 
body button:hover, 
body a.button:hover, 
body a.button:active, 
body input[type=button]:active, 
body input[type=button]:hover, 
body input[type=reset]:active, 
body input[type=reset]:hover, 
body input[type=submit]:hover, 
body input[type=submit]:active,
body .elementor-button:hover,
body .elementor-button:active,
body .wp-block-button__link:hover,
body .wp-block-button__link:active,
body #colophon .wp-block-button__link:hover,
body #colophon .wp-block-button__link:active,
body .fluentform .ff_upload_btn.ff-btn:hover,
body form.frm-fluent-form .ff-btn-submit:hover,
body .fluentform .ff_upload_btn.ff-btn:active,
body form.frm-fluent-form .ff-btn-submit:active {
	background: <?php echo esc_html(get_theme_mod( 'kaya_button_hover_color', '#005dc4' )) ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_button_hover_text_color', '#ffffff' )) ?>;
	border-color: <?php echo esc_html(get_theme_mod( 'kaya_button_border_hover_color', '#005dc4' )) ?>;
}

html .woocommerce a.button,
html .woocommerce a.button:visited,
html .woocommerce #respond input#submit.alt, 
html .woocommerce a.button.alt, 
html .woocommerce a.button.alt:visited, 
html .woocommerce button.button.alt, 
html .woocommerce button.button.alt:visited, 
html .woocommerce input.button.alt,
html :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button {
	background: <?php echo esc_html(get_theme_mod( 'kaya_woo_button_background_color', '#0075a5' )) ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_woo_button_text_color', '#ffffff' )) ?>;
	border-color: <?php echo esc_html(get_theme_mod( 'kaya_woo_button_background_color', '#005dc4' )) ?>;
	<?php if( esc_html(get_theme_mod( 'kaya_border_radius', '' )) != '' ) { ?>
		border-radius: <?php echo esc_html(get_theme_mod( 'kaya_border_radius', '0' )) ?>px;
	<?php } ?>
	border-width: <?php echo esc_html(get_theme_mod( 'kaya_border_width', '0' )) ?>px;
	border-style: solid;
}

html .woocommerce a.button:hover,
html .woocommerce a.button:active,
html .woocommerce #respond input#submit.alt:hover, 
html .woocommerce a.button.alt:hover, 
html .woocommerce button.button.alt:hover, 
html .woocommerce input.button.alt:hover,
html .woocommerce #respond input#submit.alt:active, 
html .woocommerce a.button.alt:active, 
html .woocommerce button.button.alt:active, 
html .woocommerce input.button.alt:active,
html :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:hover,
html :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button:active {
	background: <?php echo esc_html(get_theme_mod( 'kaya_woo_button_background_hover_color', '#005dc4' )) ?>;
	border-color: <?php echo esc_html(get_theme_mod( 'kaya_woo_button_background_hover_color', '#005dc4' )) ?>;
	color: <?php echo esc_html(get_theme_mod( 'kaya_woo_button_text_hover_color', '#181818' )) ?>;
}

html .woocommerce div.product p.price, 
html .woocommerce div.product span.price,
html .woocommerce ul.products li.product .price,
html .woocommerce-message::before,
html .woocommerce div.product .stock {
	color: <?php echo esc_html(get_theme_mod( 'kaya_woo_accent_color', '#77a464' )) ?>;
}

html .woocommerce span.onsale {
	background: <?php echo esc_html(get_theme_mod( 'kaya_woo_accent_color', '#77a464' )) ?>;
}
html .woocommerce-message {
	border-top-color: <?php echo esc_html(get_theme_mod( 'kaya_woo_accent_color', '#77a464' )) ?>;
}

<?php 
$kaya_grid_width = esc_html(get_theme_mod( 'kaya_grid_width', '1140' )); 
$kaya_grid_width = ($kaya_grid_width > 320) ? $kaya_grid_width : 1140;
?>
<?php if(get_theme_mod( 'kaya_content_in_grid', false )) { ?>
	#content, body .vc_row[data-vc-full-width="true"] > .wpb_column, header:not(#masthead) .container, #content .container, .wp-block-cover .wp-block-cover__inner-container, .wp-block-cover-image .wp-block-cover__inner-container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		width: 100%;
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
		echo '<!-- Add Google analytics tag (gtag.js) -->';
		echo '<script async src="https://www.googletagmanager.com/gtag/js?id=' . esc_html(get_theme_mod( 'kaya_google_analytics' )) . '"></script>';
		echo '<script>';
		echo 'window.dataLayer = window.dataLayer || [];';
		echo 'function gtag(){dataLayer.push(arguments);}';
		echo "gtag('js', new Date());";

  		echo "gtag('config', '" . esc_html(get_theme_mod( 'kaya_google_analytics' )) . "');";
		echo "</script>";
		echo '<!-- End Google tag (gtag.js) -->';
	} 

	/* Tag manager option */
	if(!empty(get_theme_mod( 'kaya_google_tag_analytics' ))) {
		echo '<!-- Global site tag (gtag.js) - Google Analytics -->';
		echo '<script async src="https://www.googletagmanager.com/gtag/js?id=';
		echo esc_html(get_theme_mod( 'kaya_google_tag_analytics' ));
		echo '"></script>';
		echo "<script>
			window.dataLayer = window.dataLayer || [];
		 	function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

		 	gtag('config', '";
		 echo esc_html(get_theme_mod( 'kaya_google_tag_analytics' ));
		 echo "');
		</script>";
		echo '<!-- End Global site tag (gtag.js) - Google Analytics -->';
	} 
 
}
add_action( 'wp_head', 'kaya_customizer_settings' );


