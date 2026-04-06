<?php
/**
 * The template for displaying all single posts
 *
 * @package Shaheer
 */

get_header();
?>

<article class="section single-post">
	<div class="container">
		<div class="single-post__header">
			<div class="single-post__meta">
				<time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('F j, Y'); ?></time>
				<?php
				$tags = get_the_tags();
				if ( $tags ) : ?>
					<div class="single-post__tags">
						<?php foreach ( $tags as $tag ) : ?>
							<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tag"><?php echo esc_html( $tag->name ); ?></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<h1 class="single-post__title"><?php the_title(); ?></h1>
		</div>

		<?php if ( has_post_thumbnail() ) :
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
		?>
			<div class="single-post__image">
				<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
			</div>
		<?php endif; ?>

		<div class="single-post__content">
			<?php the_content(); ?>
		</div>

		<div class="single-post__nav">
			<?php
			$prev = get_previous_post();
			$next = get_next_post();
			if ( $prev ) : ?>
				<a href="<?php echo esc_url( get_permalink( $prev ) ); ?>" class="post-nav-link post-nav-prev">
					<span class="post-nav-label">&larr; Previous</span>
					<span class="post-nav-title"><?php echo esc_html( get_the_title( $prev ) ); ?></span>
				</a>
			<?php endif;
			if ( $next ) : ?>
				<a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="post-nav-link post-nav-next">
					<span class="post-nav-label">Next &rarr;</span>
					<span class="post-nav-title"><?php echo esc_html( get_the_title( $next ) ); ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
</article>

<?php
get_footer();
