<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Shaheer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?> role="listitem">
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-card__link">
		<?php if ( has_post_thumbnail() ) :
			$thumbnail_id = get_post_thumbnail_id( $post->ID );
			$alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
		?>
			<div class="blog-card__image">
				<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post, 'medium_large' ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
			</div>
		<?php endif; ?>
		<div class="blog-card__body">
			<h3 class="blog-card__title"><?php the_title(); ?></h3>
			<p class="blog-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
			<div class="blog-card__footer">
				<time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('M j, Y'); ?></time>
				<span class="blog-card__arrow" aria-hidden="true">&nearr;</span>
			</div>
		</div>
	</a>
</article>
