<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 2.0
 */

?>

	</div><!-- #content -->

	
	<footer id="colophon" class="site-footer">
		<?php 
		get_template_part('template-parts/footer', 'top');
		get_template_part('template-parts/footer', 'site-info');
		?>
	</footer><!-- #colophon -->
		
</div><!-- #page -->



<?php wp_footer(); ?>


</body>
</html>
