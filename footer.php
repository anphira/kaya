<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kaya
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-columns <?php if(get_theme_mod( 'kaya_footer_columns_in_grid' ) == true) echo 'container'; ?>">
			<?php 
			if(get_theme_mod( 'kaya_show_footer_columns' ) == true) {
				switch(get_theme_mod( 'kaya_footer_columns' )) {
					case 'one_column': 
						echo '<div class="columns-12 last">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						break;
					case 'two_column': 
						echo '<div class="columns-6">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						echo '<div class="columns-6 last">';
						dynamic_sidebar('Footer-2');
						echo '</div>';
						break;
					case 'three_column': 
						echo '<div class="columns-4">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						echo '<div class="columns-4">';
						dynamic_sidebar('Footer-2');
						echo '</div>';
						echo '<div class="columns-4 last">';
						dynamic_sidebar('Footer-3');
						echo '</div>';
						break;
					case 'four_column': 
						echo '<div class="columns-3">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						echo '<div class="columns-3">';
						dynamic_sidebar('Footer-2');
						echo '</div>';
						echo '<div class="columns-3">';
						dynamic_sidebar('Footer-3');
						echo '</div>';
						echo '<div class="columns-3 last">';
						dynamic_sidebar('Footer-4');
						echo '</div>';
						break;
					default: 
						echo '<div class="columns-12 last">';
						dynamic_sidebar('Footer-1');
						echo '</div>';
						break;
				}
			} ?>
		</div>
		<div class="site-info">
			<div class="container">
				<div class="columns-6">
					<?php if(get_theme_mod( 'kaya_show_footer_social') == true) kaya_social_icons(); ?>
					Copyright &copy; <?php echo date('Y'); ?>. All rights reserved. <?php bloginfo('name'); ?>.
				</div>
				<div class="columns-6 last text-right">
					<?php if(get_theme_mod( 'kaya_footer_right' ) != '') {
						echo get_theme_mod( 'kaya_footer_right' ); 
					}
					else { ?>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kaya' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'kaya' ), 'WordPress' ); ?></a>
					<br />
					<a href="<?php echo esc_url( __( 'https://www.anphira.com/', 'kaya' ) ); ?>"><?php printf( esc_html__( 'Theme: Kaya by %s', 'kaya' ), 'Anphira Web Design & Development' ); ?></a>
					<?php } ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<!-- Schema.org -->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "<?php echo get_theme_mod( 'kaya_schema_type' ); ?>",
  "additionalType": "<?php echo get_theme_mod( 'kaya_schema_additional_type' ); ?>",
  "name": "<?php if(get_theme_mod( 'kaya_schema_name' ) == '') { bloginfo('name'); } else { echo get_theme_mod( 'kaya_schema_name' ); } ?>",
  "description": "<?php echo get_theme_mod( 'kaya_schema_description' ); ?>",
  "logo": "<?php echo get_theme_mod( 'kaya_logo' ); ?>",
  "url": "<?php echo esc_url( home_url() ); ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?php echo get_theme_mod( 'kaya_schema_address_street' ); ?>",
    "addressLocality": "<?php echo get_theme_mod( 'kaya_schema_address_locality' ); ?>",
    "addressRegion": "<?php echo get_theme_mod( 'kaya_schema_address_region' ); ?>"
    "postalCode": "<?php echo get_theme_mod( 'kaya_schema_address_postal' ); ?>",
    "addressCountry": "<?php echo get_theme_mod( 'kaya_schema_address_country' ); ?>"
  },
  "hasMap": "<?php echo get_theme_mod( 'kaya_schema_map' ); ?>",
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "<?php echo get_theme_mod( 'kaya_schema_latitude' ); ?>",
    "longitude": "<?php echo get_theme_mod( 'kaya_schema_longitude' ); ?>"
  },
  "telephone": "<?php echo get_theme_mod( 'kaya_schema_phone' ); ?>",
  "openingHours": [ "<?php echo get_theme_mod( 'kaya_schema_open_hours_1' ); ?>", "<?php echo get_theme_mod( 'kaya_schema_open_hours_2' ); ?>" ],
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "<?php echo get_theme_mod( 'kaya_schema_review_value' ); ?>",
    "reviewCount": "<?php echo get_theme_mod( 'kaya_schema_review_count' ); ?>"
  },
  "sameAs" : [ <?php echo '"', get_theme_mod( 'kaya_facebook' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_twitter' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_linkedin' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_google_plus' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_youtube' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_vimeo' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_instagram' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_pinterest' ), '", '; ?>
	<?php echo '"', get_theme_mod( 'kaya_yelp' ), '"'; ?>]
}
</script>
<!-- End Schema.org -->

<?php if(get_theme_mod( 'kaya_cf7_redirect_url') !== '') { ?>
	<script>
	document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '<?php echo get_theme_mod( 'kaya_cf7_redirect_url' ); ?>';
	}, false );
	</script>
<?php } ?>



<?php if(get_theme_mod( 'kaya_add_to_body_bottom' ) !== '') {
	$tempy = get_theme_mod( 'kaya_add_to_body_bottom' );
	echo htmlspecialchars_decode($tempy);
} ?>


<?php wp_footer(); ?>

</body>
</html>
