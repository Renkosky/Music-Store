<?php
    require_once("project1_fns.php");
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    session_start();
    try {
      if(!filled_out($username)){
        throw new Exception("You have not filled the form out correctly - please go back and try again.");
      }
      if (!valid_email($email)) {
        throw new Exception('That is not a valid email address.  Please go back and try again.');
      }
      if ($password != $password2) {
        throw new Exception("The passwords you entered do not match - please go back and try again.");
      }

      register($username,$email,$password);
      echo 'Your registration was successful!';
    } catch (Exception $e) {
      echo $e->getMessage();
    }

?>
