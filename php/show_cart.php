<?php
/**
* @author switch
* @copyright 2015
* 显示用户购物车的内容。也用来向购物车添加图书
*/
   //require_once语句和require语句完全相同,唯一区别是PHP会检查该文件是否已经被包含过,如果是则不会再次包含。
   require_once('album_fns.php');

   session_start();

   @$new = $_GET['new'];

   if($new)
   {
       if(!isset($_SESSION['cart']))   //购物车中无物品
       {
           $_SESSION['cart'] =array();
           $_SESSION['items'] = 0;
           $_SESSION['total_price'] = '0.00';
       }

       if(isset($_SESSION['cart'][$new]))
       {
           $_SESSION['cart'][$new]++;
       }
       else
       {
           $_SESSION['cart'][$new] = 1;
       }

       $_SESSION['total_price'] = calculate_price($_SESSION['cart']);

       $_SESSION['items'] = calculate_items($_SESSION['cart']);
   }

   if(isset($_POST['save']))
   {
       foreach($_SESSION['cart'] as $isbn => $qty)
       {
           if($_POST[$isbn] == '0')
               unset($_SESSION['cart'][$isbn]);
           else
               $_SESSION['cart'][$isbn] = $_POST[$isbn];
       }

       $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
       $_SESSION['items'] = calculate_items($_SESSION['cart']);
   }

   do_html_header();



   if((@$_SESSION['cart']) && (array_count_values($_SESSION['cart'])))
   { ?>
     <div class="wrap">
       <div class="container">
         <ol class="breadcrumb">
           <li><a href="storeapp.php">首页</a></li>
           <li><a href="catgories.php">全部分类</a></li>
           <?php switch ($_SESSION['catid']) {
             case 1:
             echo " <li><a class=\"show_cat.php?catid=1\">影视原声</a></li>";
             break;
             case 2:
             echo " <li><a href=\"show_cat.php?catid=2\">游戏原声</a></li>";
             break;
             case 3:
             echo " <li><a href=\"show_cat.php?catid=3\">动漫原声</a></li>";
             break;
             default:
             break;
           }?>
           <li class="active">购物车</li>
         </ol>
             <?php  display_cart($_SESSION['cart']);?>
              </div>
       </div><?php
   }
   else
   {
       echo "<h1>你的购物车中没有商品</h1>";
   }
   //如果只有一种物品添加到购物车，可以继续购物
   do_html_footer();
?>
