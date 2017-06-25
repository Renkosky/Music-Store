<?php

function do_html_URL($url, $name) {
  // output URL as link and br

  ?><a href="<?php echo $url;?>" ><?php echo $name;?></a>
<?php
}
/*
展示数据库中专辑的分类

param：$cate_array 分类数组
*/
function display_categories($cate_array){
  if (!is_array($cate_array)) {
    echo "<p>现在没目录</p>";
    return ;

  }
  echo "<div class=\"list-group\">";
  foreach ($cate_array as $row) {
    $url = "show_cat.php?catid=".$row['catid'];
    $tite = $row['catname'];
    do_html_URL($url,$tite);

  }
   echo "</div>";
 }

 /*
 展示数据库中的专辑

 param：$cate_array 分类数组
 */
 function display_albums($album_array)
 {
   if(!is_array($album_array)){
     echo "<p>现在没目录</p>";
   }else {
    foreach ($album_array as $row) {
      $url = "show_album.php?isbn=".$row['isbn'];
      echo "<tr><td>";

    if (@file_exists("../images/".$row['isbn'].".jpg")) {
      $titie = "<img src=\"../images/".$row['isbn'].".jpg\" style=\"border: 3px solid black\"/>";?>

        <div class="col-sm-3 col-md-4">
          <div class="thumbnail">
            <?php do_html_URL($url,$titie);?>
            <div class="caption">
              <h3><?php echo $row['title']; ?></h3>
              <p><?php echo $row['author']; ?></p>
              <p><?php echo $row['price']; ?>￥</p>
              <p><?php echo $row['description']; ?></p>
              <p><a href="show_cart.php?new=<?php echo $row['isbn'] ?>" class="btn btn-primary" role="button">添加至购物车</a> <a href="#" class="btn btn-default" role="button">详细信息</a></p>
            </div>
          </div>
        </div>

      <?php  }
   }
  }
}

 function display_albums_details($album){
   if(is_array($album))
       {
           echo "<table><tr>";
           //  如果图片存在
           if(@file_exists("../images/". $album['isbn'] .".jpg"))
           {
               $size = getimagesize("../images/". $album['isbn'] .".jpg");
               if(($size[0] > 0) && ($size[1] > 0))
               {
                   echo "<td><img src=\"../images/". $album['isbn'] .".jpg\" style=\"border: 1px solid black\"/></td>";
               }
           }
           echo "<td><ul>";
           echo "<li><strong>Author:</strong>";
           echo $album['author'];
           echo "</li><li><strong>ISBN:</strong>";
           echo $album['isbn'];
           echo "</li><li><strong>Our Price:</strong>";
           echo number_format($album['price'],2);
           echo "</li><li><strong>Description:</strong>";
           echo $album['description'];
           echo "</li></ul></td></tr></table>";
       }
       else
       {
           echo "<p>The details of this album cannot be displayed at this time.</p>";
       }
       echo "<hr/>";
 }


 function do_html_header(){?>
   <!DOCTYPE html>
   <html lang="zh-CN">
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>MusicStore</title>

       <!-- Bootstrap -->
       <link href="../css/bootstrap.min.css" rel="stylesheet">
       <link href="../css/store.css" rel="stylesheet">
       <link rel="stylesheet" href=".././css/csscatgories.css">
       <!--[if lt IE 9]>
         <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
         <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
       <![endif]-->
   </head>
   <body>
      <nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom:0px; border-radius:0px" role="navigation">
           <div class="container-fluid " style="height:66px">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                 <span class="sr-only">切换导航</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </button>
                   <li><a class="navbar-brand brand" href="../storeapp.html">Music Store</a>
                       <li>
               </div>
               <div class="navbar-right collapse navbar-collapse  navbar-inverse" id="example-navbar-collapse">
                   <ul class="nav navbar-nav">
                       <li><a href="#">分类</a></li>
                       <li><a href="#">购物车(<?php if($_SESSION['items']){echo $_SESSION['items'];}else {
                         echo "0";
                       } ?>)</a></li>
                       <li><a href="#">账户</a> </li>
                   </ul>
               </div>
           </div>
       </nav>
<?php
 }


function do_html_footer(){?>
  <footer class="bs-footer">
    <div class="container">

      <p>Designed and built by RenkoSky</p>
      <p><a href="https://renkosky.github.io/">
        Renko\'s Blog</a>
  </p>
    </div>
  </footer>

          <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
          <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
          <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="../js/jquery-3.1.0.min.js" charset="utf-8"></script>
          <script src="../js/bootstrap.min.js"></script>
          <script src="../js/bootstrap.js"></script>
  </body>
  </html><?php
}



function display_cart($cart,$change = true,$images = 1)  //显示购物车
    {
        echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\">
                <form action=\"show_cart.php\" method=\"post\">
                    <tr>
                        <th colspan=\"". (1 + $images) ."\" bgcolor=\" #cccccc\">Item</th>
                        <th bgcolor=\"#cccccc\">Price</th>
                        <th bgcolor=\"#cccccc\">Quantity</th>
                        <th bgcolor=\"#cccccc\">Total</th>
                    </tr>";
        //输出购物车内容
        foreach($cart as $isbn => $qty)
        {
            $album = get_album_details($isbn);
            echo "<tr>";
            if($images == true)
            {
                echo "<td align=\"left\">";
                if(file_exists("../images/". $isbn .".jpg"))
                {
                    $size = getimagesize("../images/". $isbn .".jpg");
                    if(($size[0] > 0) && ($size[1] > 1))    //图片长宽
                    {
                        echo "<img src=\"../images/". $isbn .".jpg\"
                                style=\"border: 1px solid black\"
                                width=\"". ($size[0] / 3) ."\"
                                height=\"". ($size[1] / 3) ."\"/>";
                    }
                }
                else
                    echo " ";
                echo "</td>";
            }
            echo "<td align=\"left\">
                    <a href=\"show_album.php?isbn=". $isbn ."\">". $album['title'] ."</a> by". $album['author'] ."</td>
                    <td align=\"center\">\$". number_format($album['price'],2) ."</td><td align=\"center\">";

            //如果允许更改数量
            if ($change == true)
            {
                echo "<input type=\"text\" name=\"".$isbn."\" value=\"".$qty."\" size=\"3\">";
            }
            else
            {
                echo $qty;
            }
                echo "</td><td align=\"center\">\$".number_format($album['price']*$qty,2)."</td></tr>\n";
  }


        //总数
        echo "<tr>
                <th colspan=\"". (2 + $images) ."\" bgcolor = \"#cccccc\"> </th>
                <th align = \"center\" bgcolor=\"#cccccc\">". $_SESSION['items'] ."</th>
                <th align = \"center\" bgcolor=\"#cccccc\">￥". number_format($_SESSION['total_price'],2) ."</th></tr>";

        //保存按钮
        if($change == true)
        {
            echo "<tr>
                    <td colspan = \"". (2 + $images) ."\"> </td>
                    <td align = \"center \">
                        <input type=\"hidden\" name=\"save\"value=\"true\" />
                        <input type = \"image\" src = \"../images/save-changes.gif\" border = \" 0 \" alt = \" Save Changes \" />
                         <a href=\"check.php\">付款</a>
                    </td>
                    <td> </td>
                    </tr>";

        }
        echo "</form></table>";
    }



?>
