<section class="hero text-center">
  <div class="container main-hero">
    <div class="hero__img" aria-hidden="true">
      <?php
        $image_attributes = array(
            'class' => 'img-fluid',
            'fetchPriority' => 'high',
        );

        ja_get_attachment(get_sub_field('image'), '', $image_attributes, true);
      ?>
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

<section class="about-us text-left" id="about">
  <div class="shape shape--bottom-main"></div>
    <div class="container">
      <h2>Shopify Projects:</h2>
      <a href="#">https://joovv.com</a>
      <a href="#">https://morganjuliadesigns.com</a>
      <a href="#">https://flybean.com</a>
      <a href="#">https://www.hudsonvalleyfisheries.com</a>
      <a href="#">https://pixiewing.com</a>
      <a href="#">https://stockyardx.com</a>
      <a href="#">https://gods-elf.com</a>
      <a href="#">https://www.arcadian.ai</a>
      <a href="#">https://jw-mybestie.com</a>
      <a href="#">https://shopchicallure.com</a>
      <a href="#">https://lastaristocrat.com</a>
      <a href="#">https://hairsecretsextensions.com.au</a>
    </div>

    <div class="container">
      <h2>Wordpress Projects:</h2>
      <a href="#">https://letsbackflip.com/ <span>(Wordpress Custom Theme)</span></a>
      <a href="#">https://wishin.org/ <span>(Wordpress Custom Theme)</span></a>
      <a href="#">https://rockabledesign.com/ <span>(Wordpress Custom Theme)</span></a>
      <a href="#">https://rockabledesign.com/v2/ <span>(Wordpress Custom Theme)</span></a>
      <a href="#">https://uptek.com/ <span>(Custom: HTML, SCSS, Wordpress)</span></a>
      <a href="#">https://www.nationalchildrensalliance.org/ <span>(Custom: HTML, SCSS, Wordpress)</span></a>
    </div>

    <div class="container">
      <h2>Other:</h2>
      <a href="#">https://sctechglobal.com/ <span>(Custom: HTML, CSS, JS)</span></a>
      <a href="#">https://softoo.co/ <span>(Custom: HTML, CSS, JS)</span></a>
      <a href="#">https://www.farminbox.in/ <span>(Custom: HTML, CSS, React)</span></a>
      <a href="#">https://gamefuse.co/ <span>(Custom: Ruby)</span></a>
      <a href="#">https://opentools.io/ <span>(Custom: Tailwind, React)</span></a>
      <a href="#">https://hamidkhatib.com/ <span>(Custom: HTML, CSS)</span></a>
      <a href="#">https://sctechglobal.com/ <span>(Custom: HTML, CSS, JS)</span></a>
      <a href="#">https://softoo.co/ <span>(Custom: HTML, CSS, JS)</span></a>
      <a href="#">https://www.farminbox.in/ <span>(Custom: HTML, CSS, React)</span></a>
    </div>

    <div class="container">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-1.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-2.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-3.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-4.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-5.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-6.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-7.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-8.png" alt=""></div>
          <div class="swiper-slide"><img src="<?php echo get_template_directory_uri()?>/assets/images/review-9.png" alt=""></div>
        </div>
      </div>
    </div>
</section>