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
              <p><a href="#" class="btn btn-primary" role="button">添加至购物车</a> <a href="#" class="btn btn-default" role="button">详细信息</a></p>
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
           echo "<p>The details of this book cannot be displayed at this time.</p>";
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
                       <li><a href="#">购物车</a></li>
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
}?>
