<?php
/**
 * The main template file
 *
 * @package Shaheer
 */

get_header();
?>

<section class="section blog-listing">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<h2 class="section-label">Blog</h2>
			<p class="section-heading"><?php single_post_title(); ?><span class="accent">.</span></p>

			<div class="blog-grid" role="list">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			?>
			</div>

			<div class="posts-nav">
				<?php the_posts_navigation( array(
					'prev_text' => '&larr; Older Posts',
					'next_text' => 'Newer Posts &rarr;',
				) ); ?>
			</div>

		<?php else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
	</div>
</section>

<?php
get_footer();
