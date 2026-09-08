<?php
/**
 * Template Name: Fire Keys
 *
 * Standalone, full-viewport template for the "Fire Keys" typing shooter.
 * The game owns the whole screen, so this template skips the theme
 * header/footer and renders its own document shell.
 *
 * @package Shaheer
 */

// The game is full-bleed and fixed-position, so drop the admin bar and its
// body-bumping styles. `show_admin_bar` is too late here — the bar is already
// initialised on `template_redirect` before this template loads.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_admin_bar_bump_styles' );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_admin_bar_header_styles' );
remove_action( 'wp_body_open', 'wp_admin_bar_render', 0 );
remove_action( 'wp_footer', 'wp_admin_bar_render', 1000 );

add_action(
	'wp_enqueue_scripts',
	function () {
		// Drop the theme stylesheet on this page — the game ships its own reset.
		wp_dequeue_style( 'theme' );

		wp_enqueue_style(
			'fire-keys-fonts',
			'https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500;700&family=JetBrains+Mono:wght@400;700&display=swap',
			array(),
			null
		);
		wp_enqueue_style( 'fire-keys', get_template_directory_uri() . '/assets/css/fire-keys.css', array( 'fire-keys-fonts' ), _S_VERSION );
		wp_enqueue_script( 'fire-keys', get_template_directory_uri() . '/assets/js/fire-keys.js', array(), _S_VERSION, true );
	},
	20
);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="shake">
  <canvas id="range"></canvas>

  <header>
    <div class="brand"><span class="dot"></span><b>FIRE&nbsp;KEYS</b></div>
    <a class="back-fun" href="<?php echo esc_url( home_url( '/fun-projects/' ) ); ?>">← Fun Projects</a>
    <div class="stats">
      <div class="stat wpn"><span>WEAPON</span><b id="sWpn">—</b></div>
      <div class="stat"><span>SHOTS</span><b id="sShots">0</b></div>
      <div class="stat"><span>RPM</span><b id="sRpm">0</b></div>
      <div class="stat"><span>STREAK</span><b id="sStreak">0</b></div>
    </div>
  </header>

  <main>
    <div id="hint">
      <h2>PRESS ANY KEY</h2>
      <p>EVERY KEY IS A DIFFERENT GUN</p>
    </div>
    <div id="ammo"><div class="n" id="aN">30</div><div class="m" id="aM">/ 30 &nbsp;·&nbsp; SHIFT+R RELOAD</div></div>
  </main>

  <footer>
    <div class="ctl">
      <button id="muteBtn">SOUND: ON</button>
      <input id="vol" type="range" min="0" max="100" value="80">
    </div>
    <div class="kb" id="kb"></div>
    <div class="legend" id="legend"></div>
  </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
