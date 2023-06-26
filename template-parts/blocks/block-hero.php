<section class="hero text-center">
  <div class="container">
    <div class="hero__img" aria-hidden="true">
      <?php  ja_get_attachment( get_sub_field( 'image' ), '', 'img-fluid', true ) ;?>
    </div>
    <div>
      <h1><?php echo get_sub_field('title');?> <span id="typed5"></span></h1>
      <?php
        ja_the_field( 'subtitle', '<h3 class="darktext">', '</h3>', true );
        ja_the_field( 'description', '<p>', '</p>', true );

        if( get_sub_field('social_links') ){
          get_template_part( 'template-parts/social/social', 'links' );
        }
      ?>
    </div>
  </div>
</section>