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
  <h2>About</h2>
<pre class="for-desktop">
  <span class="method">class</span> <span class="propname">Shaheerkn</span> {
  <span class="dot">··</span><span class="comment">// I can, because I did.</span>
  <span class="dot">··</span><span class="comment">// My vast variety of skills is continuously expanding.</span>
  <span class="dot">··</span><span class="method">constructor()</span> {
  <span class="dot">····</span><span class="scope">this</span>.<span class="vname">name</span> = 'Muhammad Shaheer'
  <span class="dot">····</span><span class="scope">this</span>.<span class="vname">dayOfBirthTimestamp</span> = 602745592
  <span class="dot">····</span><span class="scope">this</span>.<span class="vname">email</span> = 'shaheer.devv@gmail.com'
  <span class="dot">··</span>}
  <span class="dot">··</span><span class="propname">workExperience()</span> {
  <span class="dot">····</span><span class="method">return</span> [
  <span class="dot">······</span>{ <span class="string">'2022-now' : 'Frontend developer - Uptek' </span>}
  <span class="dot">······</span>{ <span class="string">'2022-now' : 'Freelance developer - Softoo' </span>}
  <span class="dot">······</span>{ <span class="string">'2022-now' : 'Freelance developer - SCT' </span>}
  <span class="dot">······</span>{ <span class="string">'2020-now' : 'Freelance developer - Upwork' </span>}
  <span class="dot">····</span>]
  <span class="dot">··</span>}
  <span class="dot">··</span><span class="propname">portfolio()</span> {
  <span class="dot">····</span><span class="method">return</span> [
  <span class="dot">······</span>{ <span class="string">'backflip'  : <a href="https://letsbackflip.com/" target="_blank">'https://letsbackflip.com/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'farminbox' : <a href="https://www.farminbox.in/" target="_blank">'https://www.farminbox.in/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'joovv'     : <a href="https://joovv.com/" target="_blank">'https://joovv.com/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'morgan'    : <a href="https://morganjuliadesigns.com/" target="_blank">'https://morganjuliadesigns.com/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'flybean'   : <a href="https://www.flybean.com/" target="_blank">'https://www.flybean.com/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'rockable'  : <a href="https://rockabledesign.com/" target="_blank">'https://rockabledesign.com/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'rockableV2': <a href="https://rockabledesign.com/v2/" target="_blank">'https://rockabledesign.com/v2/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'softoo'    : <a href="https://softoo.co/" target="_blank">'https://softoo.co/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'smile'     : <a href="https://smileumzug.ch/" target="_blank">'https://smileumzug.ch'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'stremo'    : <a href="https://stremo.in/" target="_blank">'https://stremo.in/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'sct'       : <a href="https://www.sctechglobal.com/" target="_blank">'https://sctechglobal.com/'</a> </span>}
  <span class="dot">······</span>{ <span class="string">'fluidbio'  : <a href="https://fluidbiomed.com/" target="_blank">'https://fluidbiomed.com/'</a> </span>}
  <span class="dot">····</span>]
  <span class="dot">··</span>}
  <span class="dot">··</span><span class="propname">funProjects()</span> {
  <span class="dot">····</span><span class="method">return</span> [
  <span class="dot">······</span>{ <span class="string"><a href="https://shaheerkn.github.io/CheckYourScreenResolution/" target="_blank">'what is my screen resolution'</a> </span>}
  <span class="dot">····</span>]
  <span class="dot">··</span>}
  <span class="dot">··</span><span class="propname">skills()</span> {
  <span class="dot">····</span><span class="method">return</span> [ <span class="string">'HTML/CSS', 'JAVASCRIPT', 'React', 'Vue.js', </span>
  <span class="dot">............</span><span class="string"> 'Bootstrap/Tailwind', 'SCSS', 'Wordpress themes',
  <span class="dot">............</span> 'Shopify themes','Figma/Sketch'</span> ]
  <span class="dot">··</span>}
  }
</pre>

<pre class="for-mobile">
<span class="method">class</span> <span class="propname">Shaheerkn</span> {
<span class="dot">··</span><span class="comment">// I can, because I did.</span>
<span class="dot">··</span><span class="comment">// My vast variety of skills is continuously expanding.</span>
<span class="dot">··</span><span class="method">constructor()</span> {
<span class="dot">····</span><span class="scope">this</span>.<span class="vname">name</span> = 'Muhammad Shaheer'
<span class="dot">····</span><span class="scope">this</span>.<span class="vname">dayOfBirthTimestamp</span> = 602745592
<span class="dot">····</span><span class="scope">this</span>.<span class="vname">email</span> = 'shaheer.devv@gmail.com'
<span class="dot">··</span>}
<span class="dot">··</span><span class="propname">workExperience()</span> {
<span class="dot">····</span><span class="method">return</span> [
<span class="dot">······</span>{ <span class="string">'2022-now' : 'Frontend developer - Uptek' </span>}
<span class="dot">······</span>{ <span class="string">'2022-now' : 'Freelance developer - SCT' </span>}
<span class="dot">······</span>{ <span class="string">'2022-now' : 'Freelance developer - Softoo' </span>}
<span class="dot">······</span>{ <span class="string">'2020-now' : 'Freelance developer - Upwork' </span>}
<span class="dot">····</span>]
<span class="dot">··</span>}
<span class="dot">··</span><span class="propname">portfolio()</span> {
<span class="dot">····</span><span class="method">return</span> [
<span class="dot">······</span>{ <span class="string">'farminbox' : <a href="https://www.farminbox.in/" target="_blank">'https://www.farminbox.in/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'joovv'     : <a href="https://joovv.com/" target="_blank">'https://joovv.com/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'morgan'    : <a href="https://morganjuliadesigns.com/" target="_blank">'https://morganjuliadesigns.com/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'flybean'   : <a href="https://www.flybean.com/" target="_blank">'https://www.flybean.com/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'rockable'  : <a href="https://rockabledesign.com/" target="_blank">'https://rockabledesign.com/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'rockableV2': <a href="https://rockabledesign.com/v2/" target="_blank">'https://rockabledesign.com/v2/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'softoo'    : <a href="https://softoo.co/" target="_blank">'https://softoo.co/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'smile'     : <a href="https://smileumzug.ch/" target="_blank">'https://smileumzug.ch'</a> </span>}
<span class="dot">······</span>{ <span class="string">'stremo'    : <a href="https://stremo.in/" target="_blank">'https://stremo.in/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'sct'       : <a href="https://www.sctechglobal.com/" target="_blank">'https://sctechglobal.com/'</a> </span>}
<span class="dot">······</span>{ <span class="string">'fluidbio'  : <a href="https://fluidbiomed.com/" target="_blank">'https://fluidbiomed.com/'</a> </span>}
<span class="dot">····</span>]
<span class="dot">··</span>}
<span class="dot">··</span><span class="propname">skills()</span> {
<span class="dot">····</span><span class="method">return</span> [ <span class="string">'HTML / CSS', 'JAVASCRIPT',
<span class="dot">.............</span>'React', 'Vue.js',
<span class="dot">.............</span>'Bootstrap / Tailwind', 'SCSS/Less' </span>
<span class="dot">.............</span><span class="string"> 'Figma/Sketch', 'Shopify themes'
<span class="dot">.............</span>'Wordpress themes'</span> ]
<span class="dot">··</span>}
}
</pre>
</div>
</section>