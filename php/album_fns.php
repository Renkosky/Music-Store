
<?php
  require_once 'db_fns';
/*
从数据库获取目录

*/
  function get_categories(){
    $conn = db_connect();
    $query = "select catid,catname from categories";
    $result = @$conn->query($query);
    if (!$result) {
      return false;
    }
    $num_cats = @$result ->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $result = db_result_to_array($result);
  }



 ?>
