<?php
  require_once("project1_fns.php");
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $con = db_connect();
  try  {
    if(login($username, $password)){
      $_SESSION['valid_user'] = $username;
      header("Location:storeapp.php");
    }
  }
  catch(Exception $e)  {
    echo '登录错误';
    echo "<a href=\"login.html\">返回</a>";
  }
 ?>
