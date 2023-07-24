<?php if( have_rows( 'social_links', 'option') ): ?>
<ul class="social-icons">
  <?php while ( have_rows( 'social_links', 'option') ) : the_row()?>
    <a href="<?php echo get_sub_field('url'); ?>" target="_blank">
      <?php get_template_part( 'template-parts/svg/svg', get_sub_field( 'social_profile') ); ?>
    </a>
  <?php endwhile; ?>
</ul>
<?php endif; ?>