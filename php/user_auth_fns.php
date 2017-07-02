<?php
  require_once("db_fns.php");

  function register($username,$email,$password){
    $conn = db_connect();
    $result = $conn->query("select * from user where username='$username'" );
    if(!$result){
      throw new Exception('Could not execute query');
    }
    if($result->num_rows>0){
      throw new Exception('用户名被使用了，换一个试试');
    }
  //  $result = $conn->query("insert into user values
    //                       ('name1', 'email2', 'password3')");
    $result = $conn->query("insert into user values
                           ('$username', '$email','sha1($password)')");

    if (!$result) {
      throw new Exception('注册失败，请再尝试一次');
    }

    return true;
  }

  function login($username,$password){
    $conn = db_connect();

    $result = $conn->query("select * from user where username='$username' and password = 'sha1($password)'");
    
    if (!$result) {
       throw new Exception('登录失败');
    }

    if ($result->num_rows>0) {
       return true;
    } else {
       throw new Exception('登录失败');
    }
  }

 ?>
