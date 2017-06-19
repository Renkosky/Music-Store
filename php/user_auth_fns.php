<?php
  require_once("db_fns.php");

  function register($username,$email,$password){
    $conn = db_connect();
    $result = $conn->query("select * from user where username='$username'" );
    if(!$result){
      throw new Exception('Could not execute query');
    }
    if($result->num_rows>0){
      throw new Exception('That username is taken - go back and choose another one.');
    }
  //  $result = $conn->query("insert into user values
    //                       ('name1', 'email2', 'password3')");
    $result = $conn->query("insert into user values
                           ('$username', '$email','sha1($password)')");

    if (!$result) {
      throw new Exception('Could not register you in database - please try again later.');
    }

    return true;
  }

  function login($username,$password){
    $conn = db_connect();

    $result = $conn->query("select * from user
                           where username='$username'
                           and password = 'sha1($password)'");
    if (!$result) {
       throw new Exception('Could not log you in.');
    }

    if ($result->num_rows>0) {
       return true;
    } else {
       throw new Exception('Could not log you in(2).');
    }
  }

 ?>
