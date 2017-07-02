<?php
  include_once 'album_fns.php';
  require_once 'output_fns.php';
  session_start();
  do_html_header();
  @$catid=$_GET['catid'];
  $_SESSION['catid']=$catid;
  $albums_array = get_albums($catid);
  echo "$catid";
  echo $_SESSION['catid'];
  ?>
  <div class="wrap">
    <div class="container">
      <ol class="breadcrumb">
      <li><a href="storeapp.php">首页</a></li>
      <li><a href="catgories.php">全部分类</a></li>
      <?php echo "<li class=\"active\">".get_category_name($_SESSION['catid'])."</li>"; ?>
      </ol>
    </div>
   <div class="container" id="album">
     <div class="row">
       <?php display_albums($albums_array);?>
   </div>
  </div>
  </div>
<?php
  do_html_footer();
 ?>
