<?php
/**
 * The template for displaying all pages
 *
 * @package Shaheer
 */

get_header();
?>

<section class="section single-post">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
		?>
			<div class="single-post__header">
				<h1 class="single-post__title"><?php the_title(); ?></h1>
			</div>
			<div class="single-post__content">
				<?php the_content(); ?>
			</div>
		<?php
		endwhile;
		?>
	</div>
</section>

<?php
get_footer();
