<?php
  require_once 'output_fns.php';
  require_once 'album_fns.php';
  session_start();
  do_html_header();
   ?>
   <div class="wrap">
     <div class="container">
       <div class="container">
         <ol class="breadcrumb">
         <li><a href="storeapp.php">首页</a></li>
         <li><a href="catgories.php">全部分类</a></li>
         <?php echo "<li><a href=\"show_cat.php?catid=".$_SESSION['catid']."\">".get_category_name($_SESSION['catid'])."</a></li>"; ?>
         <li class="active">结算页面</li>
         </ol>
       </div>
       <h1>恭喜你！你已经成功购买以下<?php echo $_SESSION['items'] ?>张专辑：</h1>
       <?php  display_cart($_SESSION['cart'] ,false)?>
     </div>
   </div>
<?php
  $_SESSION['cart'] = array();
  $_SESSION['items'] = 0;
  $_SESSION['total_price'] = '0.00';
  do_html_footer();
 ?>
