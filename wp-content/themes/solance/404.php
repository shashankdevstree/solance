<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package solance
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page_404"> 
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 d-flex justify-content-center">
		<div class="col-sm-8 col-sm-offset-1  text-center ">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">404</h1>
		</div>
		<div class="contant_box_404">
		<h3 class="h2">
		Look like you're lost
		</h3>
		
		<p>The page you are looking for not available!</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="link_404">
				<?php esc_html_e( 'Back to Home', 'solance' ); ?>
			</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>
</main><!-- #main -->

<?php
get_footer();
?>
