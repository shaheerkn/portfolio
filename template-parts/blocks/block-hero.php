<section class="hero text-center">
  <div class="container main-hero">
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

<section class="about-us text-left" id="about">
  <div class="shape shape--bottom-main"></div>
  <div class="container">
  <h2>About</h2>
<pre>
  <span class="method">class</span> <span class="propname">Shaheerkn</span> {
  <span class="dot">··</span><span class="comment">// I can, because I did.</span>
  <span class="dot">··</span><span class="comment">// My vast variety of skills is continuously expanding.</span>
  <span class="dot">··</span><span class="method">constructor()</span> {
  <span class="dot">····</span><span class="scope">this</span>.<span class="vname">name</span> = 'Muhammad Shaheer'
  <span class="dot">····</span><span class="scope">this</span>.<span class="vname">dayOfBirthTimestamp</span> = 602745592
  <span class="dot">····</span><span class="scope">this</span>.<span class="vname">email</span> = 'shaheerkn30@gmail.com'
  <span class="dot">··</span>}
  <span class="dot">··</span><span class="propname">workExperience()</span> {
  <span class="dot">····</span><span class="method">return</span> [
  <span class="dot">······</span>{ <span class="string">'2022-now' : 'Frontend developer at Uptek' </span>}
  <span class="dot">······</span>{ <span class="string">'2021-now' : 'Freelance developer at Softoo' </span>}
  <span class="dot">······</span>{ <span class="string">'2020-now' : 'Freelance developer at Upwork' </span>}
  <span class="dot">····</span>]
  <span class="dot">··</span>}
  <span class="dot">··</span><span class="propname">portfolio()</span> {
  <span class="dot">····</span><span class="method">return</span> [
  <span class="dot">······</span>{ <span class="string">'Softoo' : <a href="https://softoo.co/" target="_blank">'https://softoo.co/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'Wishin' : <a href="https://wishin.org/" target="_blank">'https://wishin.org/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'Joovv' : <a href="https://joovv.com/" target="_blank">'https://joovv.com/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'SCT' : <a href="https://www.sctechglobal.com/" target="_blank">'https://sctechglobal.com/'</a> </span>}
  <span class="dot">····</span>]
  <span class="dot">··</span>}
  <span class="dot">··</span><span class="propname">skills()</span> {
  <span class="dot">····</span><span class="method">return</span> [ <span class="string">'HTML', 'CSS', 'JAVASCRIPT', 'Bootstrap', 'Tailwind', </span>
  <span class="dot">............</span><span class="string">'Webpack/Gulp/Vite', 'SCSS/Less', 'npm/yarn', 'Figma/Sketch', 
  <span class="dot">............</span>'Webflow'</span> ]
  <span class="dot">··</span>}
  }
</pre>
</div>
</section>