<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Shaheer
 */
?>

<div class="no-results">
	<h2 class="section-label">Nothing Found</h2>
	<p class="section-heading">No posts yet<span class="accent">.</span></p>
	<?php if ( is_search() ) : ?>
		<p>Sorry, nothing matched your search terms. Please try again with different keywords.</p>
		<?php get_search_form(); ?>
	<?php elseif ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p>Ready to publish your first post? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">Get started here</a>.</p>
	<?php else : ?>
		<p>It seems we can't find what you're looking for.</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
