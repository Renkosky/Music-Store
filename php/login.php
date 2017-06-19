<?php
  require_once('db_fns.php');
  require_once("project1_fns.php");

  $username = $_POST['username'];
  $password = $_POST['password'];
  $con = db_connect();
  try  {
    login($username, $password);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
    header("Location: http://localhost/musicStore/storeapp.html");
  }
  catch(Exception $e)  {
    echo 'You could not be logged in.
          You must be logged in to view this page.';
  }
 ?>
