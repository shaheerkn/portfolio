<?php

/**
 * Renders shaheer Flexible Content
 *
 * @param  string $template The shaheer Flexible template
 */
function ja_render_flexible_rows($template = 'blocks', $post_id = null)
{

  if (!$post_id) {
    $post_id = get_the_ID();
  }

  if (get_post_status($post_id) !== 'publish') {
  	return;
  }

  if (have_rows($template, $post_id)) {

    $layout_index = 1;

    while (have_rows($template, $post_id)) {
      the_row();

      set_query_var('layout_index', $post_id . '--' . $layout_index);
      $layout = str_replace('_', '-', get_row_layout());
      get_template_part('template-parts/blocks/block', $layout);

      $layout_index++;
    }
  }
}

/**
 *  Print HTML section ID from Composer field
 */
function ja_section_id()
{
  $section_id = '';

  if ($section_id = get_sub_field('section_id')) {
    $section_id = 'id="' . $section_id . '"';
  }
  echo $section_id;
}

/**
 * echo shaheer field with HTML Markup
 *
 * @param  string $name         shaheer Object
 * @param  string $before       HTML Markup print before field, default = false
 * @param  string $after        HTML Markup print after field, default = false
 * @param  boolean $sub_field   Default = false
 * @param  boolean $option      Default = false
 * @return Mixed                render shaheer Object
 */
function ja_the_field($name = false, $before = '', $after = '', $sub_field = false, $option = false)
{
  if (!$name) {
    return;
  }

  $output = '';
  if (!$option) {
    if (!$sub_field && get_field($name)) {
      $output = get_field($name, false, false);
    } else if ($sub_field && get_sub_field($name)) {
      $output = get_sub_field($name);
    }
  } else {
    if (!$sub_field && get_field($name, 'option')) {
      $output = get_field($name, 'option');
    } else if ($sub_field && get_sub_field($name)) {
      $output = get_sub_field($name, 'option');
    }
  }

  if (!empty($output)) {
    echo $before . do_shortcode($output) . $after;
  }
}

/**
 * Return or echo attachment
 *
 * @param  integer $attachment_id Attachment ID
 * @param  string  $size         Thumbnail size
 * @param  boolean $classes      Whether to print the image class or return no class , default = no-class
 * @param  boolean $echo         Whether to print the image or return URL, default = false
 * @return Mixed                 Print <img> if $echo = true or return URL
 */
function ja_get_attachment($attachment_id = 0, $size = 'thumbnail', $classes = '', $echo = false)
{

  if (!$attachment_id) {
    return false;
  }

  if (!$echo) {
    return wp_get_attachment_image_url($attachment_id, $size);
  }

  $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE);


  echo '<img src="' . wp_get_attachment_image_url($attachment_id, $size) . '" data-src="' . wp_get_attachment_image_url($attachment_id, $size) . '" class="' . $classes . '" alt="' . $alt . '"/>';
}

/**
 * Prints an anchor tag from an array of shaheer Link object
 */
function ja_the_link($link = array(),  $classes = '', $target = '', $before = '', $after = '', $attributes = '')
{

  if (!is_array($link) || !count($link)) {
    return;
  }

  $output = '';

  if (!empty($target)) {
    $link['target'] = $target;
  }

  if (!strpos($attributes, 'aria-label')) {
    $attributes .= ' aria-label="' . wp_sprintf(__('Open for %s', 'shaheer'), strip_tags($link['url'])) . '"';
  }

  $output .= '<a href="' . $link['url'] . '" class="' . $classes . '" target="' . $link['target'] . '"' . $attributes . '>' . $link['title'] . '</a>';

  if (!empty($output)) {
    echo $before . $output . $after;
  }
}

/**
 * Embed Video From url
 */
function ja_the_video($video_url = '', $classes = '')
{
  if (empty($video_url)) return;
  $video_host = parse_url($video_url)['host'];
  $video_attributes = parse_url($video_url, PHP_URL_QUERY);
  $custom_classes = $classes ?? '';

  if ($video_host == 'youtube.com' || $video_host == 'www.youtube.com') :
    parse_str(parse_url($video_url, PHP_URL_QUERY), $youtube_vars);
?>
    <div class="iframe-container <?php echo $custom_classes; ?>">
      <iframe width="100%" src="https://www.youtube.com/embed/<?php echo $youtube_vars['v'] . '?' . $video_attributes; ?>" title="<?php echo wp_sprintf(__('Youtube Video ID: %s', 'shaheer'), $youtube_vars['v']); ?>" allow="encrypted-media" allowfullscreen></iframe>
    </div>
  <?php
  elseif ($video_host == 'vimeo.com' || $video_host == 'www.vimeo.com') :
    $vimeo_vars = explode("/", parse_url($video_url, PHP_URL_PATH));
    $vimeo_id = (int) $vimeo_vars[count($vimeo_vars) - 1];
  ?>
    <div class="iframe-container <?php echo $custom_classes; ?>">
      <iframe width="100%" src="https://player.vimeo.com/video/<?php echo $vimeo_id . '?' . $video_attributes; ?>" title="<?php echo wp_sprintf(__('Vimeo ID: %s', 'shaheer'), $vimeo_id); ?>" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
  <?php else : ?>
    <video width="100%" controls <?php echo $custom_classes ? "class=\"{$custom_classes}\"" : ''; ?>>
      <source src="<?php echo $video_url; ?>" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
<?php
  endif;
}

/**
 * if $image_tag true echo <img> or echo Svg Markup
 */
function ja_lazy_video($video_url = '', $thumbnail_id = '', $video_name = '')
{
  if (!$video_url) {
    return false;
  }

  $video_host = parse_url($video_url)['host'];
  $video_attributes = parse_url($video_url, PHP_URL_QUERY);

  $video_embed_url = '';
  $thumbnail_url = '';

  if ($thumbnail_id) {
    $thumbnail_url = ja_get_attachment($thumbnail_id, 'video-thumbnail');
  }

  if ($video_host == 'youtube.com' || $video_host == 'www.youtube.com') {
    parse_str(parse_url($video_url, PHP_URL_QUERY), $youtube_vars);

    $video_embed_url = "https://www.youtube.com/embed/{$youtube_vars['v']}?{$video_attributes}";
    $video_host = 'youtube';

    if (!$thumbnail_url) {
      $thumbnail_url = "https://img.youtube.com/vi/{$youtube_vars['v']}/maxresdefault.jpg";
    }
  } elseif ($video_host == 'vimeo.com' || $video_host == 'www.vimeo.com') {
    $vimeo_vars = explode("/", parse_url($video_url, PHP_URL_PATH));
    $vimeo_id = (int) $vimeo_vars[count($vimeo_vars) - 1];

    $video_embed_url = "https://player.vimeo.com/video/{$vimeo_id}?{$video_attributes}";
    $video_host = 'vimeo';

    if (!$thumbnail_url) {
      $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/{$vimeo_id}.php"));
      $thumbnail_url = $hash[0]['thumbnail_large'];
    }
  } else {
    $video_embed_url = $video_url;
    $video_host = 'html5';
  }

  $event_label = $video_name;

  if (!empty($event_label)) {
    $event_label .= ' ';
  }

  $event_label .= '(' . $video_url . ')';

  $output = '';

  $output .= "<div class=\"js-fire-event\" data-event-category=\"Video\" data-event-label=\"{$event_label}\">";
  $output .= "<div class=\"lazy-video\" data-host=\"{$video_host}\" data-embed=\"{$video_embed_url}\" data-thumbnail=\"{$thumbnail_url}\">";
  $output .= "<div class=\"play-button\"></div>";
  $output .= "</div>";
  $output .= "</div>";

  echo $output;
}

/**
 * Get the assets folder path using `get_template_directory_uri`.
 *
 * @param string $path Path or name of the asset.
 *
 * @return string Returns the full path of the asset.
 */
function asset_path($path, $echo = false)
{
	if (!$path) {
		return '';
	}

	$asset_url = '';

	$base_path = get_template_directory_uri() . '/assets';

	$asset_url = $path[0] === '/'
		? $base_path . $path
		: $base_path . '/' . $path;

	if (!$echo) {
		return $asset_url;
	}

	echo $asset_url;
}

/**
 * Required Plugin
 */
// require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Required plugins for theme to work properly.
 */
// require get_template_directory() . '/inc/theme-required-plugins.php';

