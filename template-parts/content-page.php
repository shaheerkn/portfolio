<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Shaheer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post__header">
		<?php the_title( '<h1 class="single-post__title">', '</h1>' ); ?>
	</div>

	<div class="single-post__content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">',
			'after'  => '</div>',
		) );
		?>
	</div>
</article>
