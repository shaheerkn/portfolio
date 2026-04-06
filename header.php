<?php
/**
 * The header for our theme
 *
 * @package Shaheer
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#0a0a0a">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="nav" role="navigation" aria-label="Main navigation">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" aria-label="Shaheer - Home">shaheer<span class="accent">.</span></a>
	<div class="nav-links">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>#work">Work</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>#reviews">Reviews</a>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>#about">About</a>
		<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"<?php if ( is_home() || is_archive() || is_single() || is_search() ) echo ' class="nav-link-active"'; ?>>Blog</a>
		<a href="https://www.upwork.com/freelancers/muhammads2657" target="_blank" rel="noopener noreferrer" class="nav-cta" aria-label="Hire me on Upwork">Hire Me</a>
	</div>
</nav>

<main>
