<?php
  include_once 'album_fns.php';
  include_once 'output_fns.php';
  session_start();
  do_html_header();
  $isbn = $_GET['isbn'];
  $album_detail =get_album_details($isbn);  ?>
<div class="wrap">
  <div class="">
    <ol class="breadcrumb">
      <li><a href="storeapp.php">首页</a></li>
      <li><a href="catgories.php">全部分类</a></li>
      <?php echo "<li><a href=\"show_cat.php?catid=".$_SESSION['catid']."\">".get_category_name($_SESSION['catid'])."</a></li>"; ?>
      <li class="active">专辑详情</li>
    </ol>
  </div>
<?php   display_albums_details($album_detail);?>
</div>

<?php  do_html_footer();?>
