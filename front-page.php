<?php
/**
 * Template Name: Front Page
 * The template for displaying the homepage
 *
 * @package Shaheer
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Freelance Frontend Developer & Shopify Specialist with 100+ projects shipped. Expert in React, Tailwind, Shopify Liquid, WordPress, and modern web development. Available for hire on Upwork.">
  <meta name="keywords" content="frontend developer, shopify developer, react developer, freelance web developer, shopify expert, wordpress developer, tailwind css, web development">
  <meta name="author" content="Muhammad Shaheer">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>">
  <meta property="og:title" content="Muhammad Shaheer — Frontend Developer & Shopify Expert">
  <meta property="og:description" content="Freelance Frontend Developer & Shopify Specialist with 100+ projects shipped. Expert in React, Tailwind, Shopify Liquid, and WordPress.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Muhammad Shaheer — Frontend Developer & Shopify Expert">
  <meta name="twitter:description" content="Freelance Frontend Developer & Shopify Specialist with 100+ projects shipped.">
  <meta name="theme-color" content="#0a0a0a">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" as="style">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'front-page-static' ); ?>>
<?php wp_body_open(); ?>
  <a href="#main" class="skip-link">Skip to main content</a>

  <nav class="nav" role="navigation" aria-label="Main navigation">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" aria-label="Shaheer - Home">shaheer<span class="accent">.</span></a>
    <div class="nav-links">
      <a href="#work">Work</a>
      <a href="#reviews">Reviews</a>
      <a href="#about">About</a>
      <a href="<?php echo esc_url( home_url( '/fun-projects/' ) ); ?>">Fun</a>
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a>
      <a href="https://www.upwork.com/freelancers/muhammads2657" target="_blank" rel="noopener noreferrer" class="nav-cta" aria-label="Hire me on Upwork">Hire Me</a>
    </div>
  </nav>

  <main id="main">
    <section class="hero" aria-label="Introduction">
      <div class="hero-content">
        <p class="hero-greeting">Hi, I'm Shaheer</p>
        <h1 class="hero-title">I build things<br>for the web<span class="accent">.</span></h1>
        <p class="hero-subtitle">Frontend Developer & Shopify Specialist crafting aesthetic, high-quality digital experiences — from concept to code.</p>
        <div class="hero-actions">
          <a href="#work" class="btn btn-primary">View My Work</a>
          <a href="https://www.upwork.com/freelancers/muhammads2657" target="_blank" rel="noopener noreferrer" class="btn btn-secondary" aria-label="Hire me on Upwork">Hire Me</a>
        </div>
      </div>
    </section>

    <section id="work" class="section work" aria-labelledby="work-heading">
      <div class="container">
        <h2 class="section-label" id="work-label">Selected Work</h2>
        <p class="section-heading" id="work-heading">Projects I've built & shipped<span class="accent">.</span></p>

        <div class="work-filters" role="group" aria-label="Filter projects by category">
          <button class="filter-btn active" data-filter="all" aria-pressed="true">All</button>
          <button class="filter-btn" data-filter="shopify" aria-pressed="false">Shopify</button>
          <button class="filter-btn" data-filter="wordpress" aria-pressed="false">WordPress</button>
          <button class="filter-btn" data-filter="other" aria-pressed="false">Web Apps</button>
        </div>

        <div class="projects-grid" role="list">

          <a href="https://www.ancientwarrior.co.uk" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Ancient Warrior - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Ancient Warrior</h3>
              <p>UK-based Shopify store for a warrior-themed brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://joovv.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Joovv - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Joovv</h3>
              <p>Custom Shopify storefront for a leading red light therapy brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://morganjuliadesigns.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Morgan Julia Designs - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Morgan Julia Designs</h3>
              <p>Elegant e-commerce store for a boutique fashion brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://flybean.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="FlyBean - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>FlyBean</h3>
              <p>Shopify build for a specialty coffee brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://hudsonvalleyfisheries.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Hudson Valley Fisheries - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Hudson Valley Fisheries</h3>
              <p>E-commerce platform for a premium fisheries company.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://pixiewing.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="PixieWing - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>PixieWing</h3>
              <p>Playful and vibrant Shopify store.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://stockyardx.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="StockyardX - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>StockyardX</h3>
              <p>Bold e-commerce build for a modern brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://gods-elf.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Gods Elf - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Gods Elf</h3>
              <p>Custom Shopify theme and storefront development.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://arcadian.ai" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Arcadian AI - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Arcadian AI</h3>
              <p>Shopify store for an AI-focused brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://shopchicallure.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Chic Allure - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Chic Allure</h3>
              <p>Chic and modern Shopify e-commerce experience.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://lastaristocrat.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Last Aristocrat - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Last Aristocrat</h3>
              <p>Premium Shopify store with refined aesthetics.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://hairsecretsextensions.com.au" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Hair Secrets Extensions - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Hair Secrets Extensions</h3>
              <p>Australian beauty brand Shopify storefront.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://worklad.com.au" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Worklad - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Worklad</h3>
              <p>Australian workwear e-commerce store on Shopify.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://cartoonova.store" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Cartoonova - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Cartoonova</h3>
              <p>Creative Shopify store for custom cartoon artwork.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://credicated.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Credicated - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Credicated</h3>
              <p>Shopify storefront with a clean, modern design.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://www.fithousedenver.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Fit House Denver - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Fit House Denver</h3>
              <p>Fitness brand Shopify store based in Denver.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://hartleyandharbour.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="Hartley and Harbour - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>Hartley & Harbour</h3>
              <p>Elegant Shopify store for a lifestyle brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://pinpinpin.it" target="_blank" rel="noopener noreferrer" class="project-card" data-category="shopify" role="listitem" aria-label="PinPinPin - Shopify store">
            <div class="project-info">
              <span class="project-tag">Shopify</span>
              <h3>PinPinPin</h3>
              <p>Fun and vibrant Shopify store for enamel pins.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://www.unvault.co" target="_blank" rel="noopener noreferrer" class="project-card" data-category="other" role="listitem" aria-label="Unvault - Webflow website">
            <div class="project-info">
              <span class="project-tag">Webflow</span>
              <h3>Unvault</h3>
              <p>Marketing website built on Webflow.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://app.unvault.co/evaluate" target="_blank" rel="noopener noreferrer" class="project-card" data-category="other" role="listitem" aria-label="Unvault App - React web application">
            <div class="project-info">
              <span class="project-tag">React &middot; Tailwind &middot; shadcn</span>
              <h3>Unvault App</h3>
              <p>Web app built with React, Tailwind, and shadcn/ui.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://nuema.life" target="_blank" rel="noopener noreferrer" class="project-card" data-category="other" role="listitem" aria-label="Nuema Life - HTML CSS JS website">
            <div class="project-info">
              <span class="project-tag">HTML &middot; CSS &middot; JS</span>
              <h3>Nuema Life</h3>
              <p>Clean lifestyle brand website.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://farminbox.in" target="_blank" rel="noopener noreferrer" class="project-card" data-category="other" role="listitem" aria-label="FarmInBox - React web application">
            <div class="project-info">
              <span class="project-tag">React</span>
              <h3>FarmInBox</h3>
              <p>Farm-to-table platform built with React.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://gamefuse.co" target="_blank" rel="noopener noreferrer" class="project-card" data-category="other" role="listitem" aria-label="GameFuse - Ruby web application">
            <div class="project-info">
              <span class="project-tag">Ruby</span>
              <h3>GameFuse</h3>
              <p>Gaming platform built with Ruby.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://sctechglobal.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="other" role="listitem" aria-label="SC Tech Global - HTML CSS JS website">
            <div class="project-info">
              <span class="project-tag">HTML &middot; CSS &middot; JS</span>
              <h3>SC Tech Global</h3>
              <p>Corporate technology company website.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://softoo.co" target="_blank" rel="noopener noreferrer" class="project-card" data-category="other" role="listitem" aria-label="Softoo - HTML CSS JS website">
            <div class="project-info">
              <span class="project-tag">HTML &middot; CSS &middot; JS</span>
              <h3>Softoo</h3>
              <p>Clean and modern software company website.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://www.arprive.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="wordpress" role="listitem" aria-label="Arprive - WordPress website">
            <div class="project-info">
              <span class="project-tag">WordPress</span>
              <h3>Arprive</h3>
              <p>Custom WordPress theme for a premium brand.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://letsbackflip.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="wordpress" role="listitem" aria-label="LetsBackflip - WordPress website">
            <div class="project-info">
              <span class="project-tag">WordPress</span>
              <h3>LetsBackflip</h3>
              <p>Custom WordPress theme development.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://wishin.org" target="_blank" rel="noopener noreferrer" class="project-card" data-category="wordpress" role="listitem" aria-label="Wishin - WordPress website">
            <div class="project-info">
              <span class="project-tag">WordPress</span>
              <h3>Wishin</h3>
              <p>Custom WordPress theme for a non-profit.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://uptek.com" target="_blank" rel="noopener noreferrer" class="project-card" data-category="wordpress" role="listitem" aria-label="Uptek - WordPress website">
            <div class="project-info">
              <span class="project-tag">WordPress &middot; SCSS</span>
              <h3>Uptek</h3>
              <p>Corporate site built with HTML, SCSS & WordPress.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

          <a href="https://nationalchildrensalliance.org" target="_blank" rel="noopener noreferrer" class="project-card" data-category="wordpress" role="listitem" aria-label="National Children's Alliance - WordPress website">
            <div class="project-info">
              <span class="project-tag">WordPress &middot; SCSS</span>
              <h3>National Children's Alliance</h3>
              <p>Non-profit organization website on WordPress.</p>
            </div>
            <span class="project-arrow" aria-hidden="true">&nearr;</span>
          </a>

        </div>
      </div>
    </section>

    <section id="reviews" class="section reviews" aria-labelledby="reviews-heading">
      <div class="container">
        <h2 class="section-label">Reviews</h2>
        <p class="section-heading" id="reviews-heading">What clients say<span class="accent">.</span></p>
        <div class="reviews-grid" role="list">

          <article class="review-card" role="listitem">
            <div class="review-stars" aria-label="5 out of 5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <blockquote class="review-text">"Fantastic work — quick turnaround, easy and clear communication, and exceptional attention to detail. Highly recommend! Will be working with Muhammad again, Thank you"</blockquote>
            <div class="review-author">
              <span class="review-name">Upwork Client</span>
              <span class="review-project">Judge.me Review Integration & Widget Customization</span>
            </div>
            <div class="review-tags" aria-label="Skills recognized">
              <span class="review-tag">Reliable</span>
              <span class="review-tag">Clear Communicator</span>
              <span class="review-tag">Detail Oriented</span>
            </div>
          </article>

          <article class="review-card" role="listitem">
            <div class="review-stars" aria-label="5 out of 5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <blockquote class="review-text">"Amazing experience, delivered exactly what we expected and communication was great - he did not leave us in the blue when there were exchanges with third parties. Thanks!"</blockquote>
            <div class="review-author">
              <span class="review-name">Upwork Client</span>
              <span class="review-project">Shopify Developer for Quick Fixes</span>
            </div>
            <div class="review-tags" aria-label="Skills recognized">
              <span class="review-tag">Clear Communicator</span>
              <span class="review-tag">Committed to Quality</span>
            </div>
          </article>

          <article class="review-card" role="listitem">
            <div class="review-stars" aria-label="5 out of 5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <blockquote class="review-text">"Working with Muhammad was great, he delivered his tasks pretty quickly and the communication was perfect. Will hire again soon."</blockquote>
            <div class="review-author">
              <span class="review-name">Upwork Client</span>
              <span class="review-project">React Landing Page Creation</span>
            </div>
            <div class="review-tags" aria-label="Skills recognized">
              <span class="review-tag">Collaborative</span>
              <span class="review-tag">Clear Communicator</span>
              <span class="review-tag">Reliable</span>
            </div>
          </article>

          <article class="review-card" role="listitem">
            <div class="review-stars" aria-label="5 out of 5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <blockquote class="review-text">"We highly recommend Muhammad. Fast, friendly and efficient guy. He built our one-pager in about half the time it took some other guys we had tested."</blockquote>
            <div class="review-author">
              <span class="review-name">Upwork Client</span>
              <span class="review-project">NextJS + UI Specialist — Animated Figma Build</span>
            </div>
            <div class="review-tags" aria-label="Skills recognized">
              <span class="review-tag">Reliable</span>
            </div>
          </article>

          <article class="review-card" role="listitem">
            <div class="review-stars" aria-label="5 out of 5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <blockquote class="review-text">"A faultless experience from start to finish, Muhammad is a real professional. A number of tweaks were needed to the code of our Shopify store and he worked quickly to deliver."</blockquote>
            <div class="review-author">
              <span class="review-name">Upwork Client</span>
              <span class="review-project">Shopify Customisation Feature</span>
            </div>
            <div class="review-tags" aria-label="Skills recognized">
              <span class="review-tag">Professional</span>
              <span class="review-tag">Reliable</span>
            </div>
          </article>

          <article class="review-card" role="listitem">
            <div class="review-stars" aria-label="5 out of 5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <blockquote class="review-text">"Project was completed on time and of solid quality. Given the tight time frame he excelled on every area. Thank you very much."</blockquote>
            <div class="review-author">
              <span class="review-name">Upwork Client</span>
              <span class="review-project">Single-Page Website in HTML/CSS</span>
            </div>
            <div class="review-tags" aria-label="Skills recognized">
              <span class="review-tag">Reliable</span>
              <span class="review-tag">Committed to Quality</span>
            </div>
          </article>

        </div>

        <div class="video-testimonials">
          <h3 class="video-testimonials-title">Video Testimonials</h3>
          <div class="video-grid">
            <div class="video-card">
              <video controls preload="metadata" playsinline aria-label="Client video testimonial 1">
                <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/videos/video1.mp4' ); ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
            <div class="video-card">
              <video controls preload="metadata" playsinline aria-label="Client video testimonial 2">
                <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/videos/video2.mp4' ); ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>
        </div>

        <p class="reviews-source">Reviews sourced from Upwork</p>
      </div>
    </section>

    <section id="about" class="section about" aria-labelledby="about-heading">
      <div class="container about-grid">
        <div class="about-content">
          <h2 class="section-label">About</h2>
          <p class="section-heading" id="about-heading">A bit about me<span class="accent">.</span></p>
          <p>I'm a frontend developer and Shopify specialist who turns concepts into clean, production-ready code. I care deeply about craft — building aesthetic software to an extremely high standard through continuous practice and learning.</p>
          <p>Whether it's a custom Shopify store, a WordPress theme from scratch, or a React-powered web app, I bring the same attention to detail and quality to every project.</p>
          <ul class="skills" aria-label="Technical skills">
            <li class="skill">HTML & CSS</li>
            <li class="skill">JavaScript</li>
            <li class="skill">React</li>
            <li class="skill">Tailwind CSS</li>
            <li class="skill">SCSS</li>
            <li class="skill">Shopify / Liquid</li>
            <li class="skill">WordPress</li>
            <li class="skill">Ruby</li>
            <li class="skill">Git</li>
          </ul>
        </div>
        <div class="about-stats" role="list" aria-label="Key statistics">
          <div class="stat" role="listitem">
            <span class="stat-number">100+</span>
            <span class="stat-label">Projects Shipped</span>
          </div>
          <div class="stat" role="listitem">
            <span class="stat-number">20+</span>
            <span class="stat-label">Shopify Stores</span>
          </div>
          <div class="stat" role="listitem">
            <span class="stat-number">10+</span>
            <span class="stat-label">WordPress Sites</span>
          </div>
        </div>
      </div>
    </section>

    <section id="tools" class="section tools" aria-labelledby="tools-heading">
      <div class="container">
        <h2 class="section-label">AI Tools</h2>
        <p class="section-heading" id="tools-heading">Yes, I vibe code<span class="accent">.</span></p>
        <p class="tools-description">AI is my pair programmer. I use the best tools to ship faster, write cleaner code, and stay caffeinated (mostly).</p>
        <div class="tools-grid" role="list">
          <article class="tool-card" role="listitem">
            <div class="tool-icon" aria-hidden="true">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                <rect width="32" height="32" rx="8" fill="#D97757"/>
                <path d="M16 6L10 12l6 6-6 6" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 18h-6" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <h3>Claude Code</h3>
            <span class="tool-plan">Max Plan</span>
            <p>Anthropic's agentic coding tool for building, editing, and shipping code directly from the terminal.</p>
          </article>
          <article class="tool-card" role="listitem">
            <div class="tool-icon" aria-hidden="true">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                <rect width="32" height="32" rx="8" fill="#fff"/>
                <path d="M16 7v18M7 16h18" stroke="#000" stroke-width="2.5" stroke-linecap="round"/>
                <circle cx="16" cy="16" r="5" stroke="#000" stroke-width="2"/>
              </svg>
            </div>
            <h3>Cursor</h3>
            <span class="tool-plan">Pro Plan</span>
            <p>AI-first code editor that helps write, edit, and understand code with intelligent completions.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="contact" class="section contact" aria-labelledby="contact-heading">
      <div class="container contact-content">
        <h2 class="section-label">Let's Connect</h2>
        <p class="section-heading" id="contact-heading">Ready to start a project<span class="accent">?</span></p>
        <p>Send me a message right here on Upwork — I'd love to hear about your project and how I can help.</p>
        <div class="contact-links">
          <a href="https://www.upwork.com/services/product/development-it-muhammad-1685026181411852288?ref=project_share" target="_blank" rel="noopener noreferrer" class="btn btn-primary" aria-label="Book a consultation on Upwork">Book a Consultation</a>
          <a href="https://www.upwork.com/freelancers/muhammads2657" target="_blank" rel="noopener noreferrer" class="btn btn-secondary" aria-label="Hire me on Upwork">Hire Me</a>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer" role="contentinfo">
    <div class="container footer-inner">
      <p>Designed & coded by Shaheer</p>
      <p class="footer-year">&copy; <?php echo date('Y'); ?></p>
    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>
