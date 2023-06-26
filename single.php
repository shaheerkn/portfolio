<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shaheer
 */

get_header();
?>
<main class="blog-archive">
  <div class="blog-hero container">
    <time><?php echo get_the_date('F j, Y'); ?></time>
    <h1><?php echo get_the_title();?> </h1>
    <?php
     if ( has_post_thumbnail() ) :
       $thumbnail_id = get_post_thumbnail_id( $post->ID );
       $alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
    ?>
     <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>" aria-hidden="true">
   <?php endif; ?>
  </div>
  <div class="container">
    <?php the_content();?>
  </div>
</main>
<?php
get_footer();
