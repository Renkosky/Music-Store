<?php
  require_once 'output_fns.php';
  require_once 'album_fns.php';
  session_start();
  do_html_header();
   ?>
   <div class="wrap">
    <h1>恭喜你！你已经成功购买以下<?php echo $_SESSION['items'] ?>张专辑：</h1>
    <?php  display_cart($_SESSION['cart'] ,false)?>
   </div>
<?php
  session_destroy();
  do_html_footer();
 ?>
