<?php
  $tags = get_the_tags();
  $is_first = true;
  $output = '';

  if ( has_tag() ){

  foreach ($tags as $tag) {
    if (!$is_first) {
      $output .= ', ';
    }

    $is_first = false;
    $output .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
  }

  echo $output;
}
?>