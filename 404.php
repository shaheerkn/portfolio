<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Shaheer
 */

get_header();
?>

<section class="section error-page">
	<div class="container error-page__content">
		<h2 class="section-label">404</h2>
		<p class="section-heading">Page not found<span class="accent">.</span></p>
		<p>The page you're looking for doesn't exist or has been moved.</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Home</a>
	</div>
</section>

<?php
get_footer();
