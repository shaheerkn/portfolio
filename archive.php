<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shaheer
 */

get_header();
?>
<main>
  <section class="blog-cards container">
  <?php if ( have_posts() ) :
    the_archive_title( '<h1 class="uppercase text-left">', '</h1>' );

    /* Start the Loop */
    while ( have_posts() ) :
      the_post();

      /*
        * Include the Post-Type-specific template for the content.
        * If you want to override this in a child theme, then include a file
        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
        */
      get_template_part( 'template-parts/content', get_post_type() );

    endwhile;

    the_posts_navigation();

  else :

    get_template_part( 'template-parts/content', 'none' );

  endif;
  ?>
  </section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
