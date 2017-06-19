<?php
require_once("../../mysql_connect.php");
$conn = new mysqli('localhost', 'Renko', 'iloveshenhua!', 'user');
$result = $conn->query("insert into user values
                       ('name1', 'email2', 'password3')");
 ?>
