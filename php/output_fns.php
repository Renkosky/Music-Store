<?php
function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
<?php
}
/*
展示数据库中专辑的分类

param：$cate_array 分类数组
*/
function display_categories($cate_array){
  if (!is_array($cate_array)) {
    # code...
  }

}
 ?>
