<?php
function do_html_URL($url, $name) {
  // output URL as link and br

  echo ""?><br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
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
    echo "<ul>";
  }
  foreach ($cate_array as $row) {
    $url = "show_cat.php?catid=".$row['catid'];
    $tite = $row['catname'];
    do_html_URL($url,$tite);
    echo "</li>";
  }
  echo "</ul>";
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
     echo "<table width = \"100%\" border=\"0\">";

    foreach ($album_array as $row) {
      $url = "show_album.php?isbn=".$row['isbn'];
      echo "<tr><td>";
    }

    if (@file_exists("../images/".$row['isbn'].".jpg")) {
      $titie = "<img src=\"../images/".$row['isbn'].".jpg\" style=\"border: 3px solid black\"/>";
      do_html_URL($url,$titie);

      echo "</td></tr>";
    }
    echo "</table>";
  }
  echo "<hr/>";

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
 ?>
