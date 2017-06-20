
<?php
  require_once 'db_fns.php';
  require_once 'output_fns.php';
/*
从数据库获取目录

*/
  function get_categories(){
    $conn = db_connect();
    mysqli_query($conn,"set names utf8");
    $query = "select catid,catname from categories ";
    $result = @$conn->query($query);
    if (!$result) {
      return false;
    }
    $num_cats = @$result ->num_rows;
    if ($num_cats == 0) {
      return false;
    }
    $result = db_result_to_array($result);
    return $result;
  }

  /*
  从数据库获取目录名名
  param:$catid
  */
  function get_category_name($catid)
  {
    $conn = db_connect();
    mysqli_query($conn,"set names utf8");
    $query = "select catname from categories where cat id = '".$catid."'";
    $result = @$conn ->query($query);
    if(!$result){
      return false;
    }
    $num_cats = @$result ->num_rows;
    if($num_cats ==0)
    return false; //查询失败，原因为无目录
       $row = $result ->fetch_object();
       return $row ->catname;
  }

  /*
  从数据库获取专辑
  param:$catid
  */
  function get_albums($catid){
    $conn = db_connect();
    $query = "select * from albums where catid = '".$catid."'";
    $result = @$conn ->query($query);
    if(!$result){
      return false;
    }
    $album = @$result ->num_rows;

    if($album==""){
      return false;
    }
    $result = db_result_to_array($result);
    return $result;
  }
  /*
  从数据库获取专辑的详细信息
  param:$isbn
  */
  function get_album_details($isbn)
  {
    if((!$isbn) || ($isbn == ''))   //如果图书统一书号为空
            return false;

        $conn = db_connect();   //连接数据库
        $query = "select * from albums where isbn = '". $isbn ."'";
        $result = @$conn ->query($query);
        if(!$result)    //查询失败，原因为查询出错
            return false;
        $result = @$result ->fetch_assoc();
        return $result;
  }
 ?>
