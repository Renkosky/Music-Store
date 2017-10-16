<?php
  require_once('project1_fns.php');

  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  try {
    if ($username||$password) {
        login($username,$password);
        $_SESSION['valid_user'] = $username;
        header("Location: http://localhost/musicStore/php/storeapp.php");
    }

  } catch (Exception $e) {
    echo ' 你无法登陆
           你的用户名或密码错误。';
          $link = '../login.html';
          echo "<a href='{$link}' title=''>返回</a>";
  }
 ?>
