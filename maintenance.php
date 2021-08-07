<?php
/**
 * The template for displaying maintenance page
 *
 * @link https://netvantagemarketing.com/add-custom-maintenance-mode-page-wordpress/
 *
 * @author  Anphira
 * @since   0.11
 * @package Kaya
 * @version 0.11
 */

/* Tell search engines that the site is temporarily unavilable */
$protocol = $_SERVER["SERVER_PROTOCOL"];
if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol ) $protocol = 'HTTP/1.0';
header( "$protocol 503 Service Unavailable", true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );
header( 'Retry-After: 600' );

 ?>
 <html>
	 <head>
	 	<title>We'll be right back!</title>
	 	<style>
	 		body {
		 		background: lightgray;
		 		font-family: Verdana;
		 		padding 40px;
		 		display: flex;
    			align-items: center;
		 	}
	 	</style>
	 </head>
	 <body>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<section>
					
		
					<header class="entry-header">
						<h1>We'll be right back!</h1>
					</header><!-- .entry-header -->
		

					<div class="page-content">
						<p>We are undergoing some routine maintenance, we'll be back shortly!</p>

					</div><!-- .page-content -->
				</section>

			</main><!-- #main -->
		</div><!-- #primary -->
	</body>
</html>
<?php
