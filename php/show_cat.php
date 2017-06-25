<?php
  include_once 'album_fns.php';
  require_once 'output_fns.php';
  session_start();
  $_SESSION['items'] = 0;
  do_html_header();
  @$catid=$_GET['catid'];
  $albums_array = get_albums($catid);

  ?>
  <div class="wrap">
   <div class="container">
     <div class="row">
       <?php display_albums($albums_array);?>
   </div>
  </div>
  </div>
<?php
  do_html_footer();
 ?>
