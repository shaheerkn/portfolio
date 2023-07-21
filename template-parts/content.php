<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shaheer
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-cards__card'); ?> >

  <?php
    if( has_post_thumbnail() ) :
      $thumbnail_id = get_post_thumbnail_id( $post->ID );
      $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
  ?>
  <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-cards__img">
    <img src=<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>" class="img-fluid">
  </a>
  <?php endif; ?>
  <div class="blog-cards__content">
    <p class="post-tag"><?php get_template_part( 'template-parts/meta/post', 'tag' ); ?></p>
    <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
  </div>
</article>
