<?php
/**
 * Template Name: Fun Projects
 *
 * Hub page listing playful side projects.
 *
 * @package Shaheer
 */

$fire_keys_url = home_url( '/fire-keys/' );
$fun_projects_url = home_url( '/fun-projects/' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Playful side projects and experiments by Muhammad Shaheer — games, toys, and things built for fun.">
  <meta name="theme-color" content="#0a0a0a">
  <link rel="canonical" href="<?php echo esc_url( $fun_projects_url ); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'fun-projects-page' ); ?>>
<?php wp_body_open(); ?>
  <a href="#main" class="skip-link">Skip to main content</a>

  <nav class="nav" role="navigation" aria-label="Main navigation">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" aria-label="Shaheer - Home">shaheer<span class="accent">.</span></a>
    <div class="nav-links">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>#work">Work</a>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>#reviews">Reviews</a>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>#about">About</a>
      <a href="<?php echo esc_url( $fun_projects_url ); ?>" class="nav-link-active" aria-current="page">Fun</a>
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a>
      <a href="https://www.upwork.com/freelancers/muhammads2657" target="_blank" rel="noopener noreferrer" class="nav-cta" aria-label="Hire me on Upwork">Hire Me</a>
    </div>
  </nav>

  <main id="main">
    <section class="fun-hero" aria-labelledby="fun-heading">
      <div class="container fun-hero-content">
        <p class="section-label">Side projects</p>
        <h1 class="section-heading" id="fun-heading">Fun projects<span class="accent">.</span></h1>
        <p class="fun-hero-subtitle">Small experiments and toys I build for the joy of making things — play around.</p>
      </div>
    </section>

    <section class="section fun-grid-section" aria-label="Fun project list">
      <div class="container">
        <div class="fun-grid" role="list">
          <a href="<?php echo esc_url( $fire_keys_url ); ?>" class="fun-card fun-card-featured" role="listitem" aria-label="Play Fire Keys — typing shooter game">
            <div class="fun-card-info">
              <span class="fun-card-tag">Typing game</span>
              <h2>Fire Keys</h2>
              <p>Every key is a different gun. Type to shoot, reload with Shift+R, and chase your streak.</p>
            </div>
            <span class="fun-card-cta">
              Play
              <span class="fun-card-arrow" aria-hidden="true">&nearr;</span>
            </span>
          </a>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer" role="contentinfo">
    <div class="container footer-inner">
      <p>Designed &amp; coded by Shaheer</p>
      <p class="footer-year">&copy; <?php echo esc_html( date( 'Y' ) ); ?></p>
    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>
