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
      <a href="https://joovv.com">https://joovv.com</a>
      <a href="https://morganjuliadesigns.com">https://morganjuliadesigns.com</a>
      <a href="https://flybean.com">https://flybean.com</a>
      <a href="https://www.hudsonvalleyfisheries.com">https://www.hudsonvalleyfisheries.com</a>
      <a href="https://pixiewing.com">https://pixiewing.com</a>
      <a href="https://stockyardx.com">https://stockyardx.com</a>
      <a href="https://gods-elf.com">https://gods-elf.com</a>
      <a href="https://www.arcadian.ai">https://www.arcadian.ai</a>
      <a href="https://jw-mybestie.com">https://jw-mybestie.com</a>
      <a href="https://shopchicallure.com">https://shopchicallure.com</a>
      <a href="https://lastaristocrat.com">https://lastaristocrat.com</a>
      <a href="https://hairsecretsextensions.com.au">https://hairsecretsextensions.com.au</a>
    </div>

    <div class="container">
      <h2>Wordpress Projects:</h2>
      <a href="https://letsbackflip.com/">https://letsbackflip.com/ <span>(Wordpress Custom Theme)</span></a>
      <a href="https://wishin.org/">https://wishin.org/ <span>(Wordpress Custom Theme)</span></a>
      <a href="https://rockabledesign.com/">https://rockabledesign.com/ <span>(Wordpress Custom Theme)</span></a>
      <a href="https://rockabledesign.com/v2/">https://rockabledesign.com/v2/ <span>(Wordpress Custom Theme)</span></a>
      <a href="https://uptek.com/">https://uptek.com/ <span>(Custom: HTML, SCSS, Wordpress)</span></a>
      <a href="https://www.nationalchildrensalliance.org/">https://www.nationalchildrensalliance.org/ <span>(Custom: HTML, SCSS, Wordpress)</span></a>
    </div>

    <div class="container">
      <h2>Other:</h2>
      <a href="https://sctechglobal.com/">https://sctechglobal.com/ <span>(Custom: HTML, CSS, JS)</span></a>
      <a href="https://softoo.co/">https://softoo.co/ <span>(Custom: HTML, CSS, JS)</span></a>
      <a href="https://www.farminbox.in/">https://www.farminbox.in/ <span>(Custom: HTML, CSS, React)</span></a>
      <a href="https://gamefuse.co/">https://gamefuse.co/ <span>(Custom: Ruby)</span></a>
      <a href="https://opentools.io/">https://opentools.io/ <span>(Custom: Tailwind, React)</span></a>
      <a href="https://hamidkhatib.com/">https://hamidkhatib.com/ <span>(Custom: HTML, CSS)</span></a>
      <a href="https://sctechglobal.com/">https://sctechglobal.com/ <span>(Custom: HTML, CSS, JS)</span></a>
    </div>
</section>