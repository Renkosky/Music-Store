<?php
  include_once 'album_fns.php';
  require_once 'output_fns.php';
  session_start();
  $_SESSION['items'] = 0;
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
      <?php switch ($_SESSION['catid']) {
        case 1:
        echo " <li class=\"active\">影视原声</li>";
        break;
        case 2:
        echo " <li class=\"active\">游戏原声</li>";
        break;
        case 3:
        echo " <li class=\"active\">动漫原声</li>";
        break;
        default:
        # code...
          break;
      }?>
      </ol>
    </div>
   <div class="container">
     <div class="row">
       <?php display_albums($albums_array);?>
   </div>
  </div>
  </div>
<?php
  do_html_footer();
 ?>
