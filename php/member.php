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
    echo 'You could not be logged in.
          You must be logged in to view this page.';
          $link = 'newindex2.html';
          echo "<a href='{$link}' title=''>return</a>";
  }
 ?>
