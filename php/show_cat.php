<?php
  include_once 'album_fns.php';
  require_once 'output_fns.php';
  session_start();

  do_html_header();

  @$catid=$_GET['catid'];
  $name = get_category_name($catid);
  $albums_array = get_albums($catid);

  display_albums($albums_array);

  do_html_footer();
 ?>
