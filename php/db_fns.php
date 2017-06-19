<?php
function db_connect() {
   $result = new mysqli('localhost', 'Renko', 'iloveshenhua!', 'album');
   if (!$result) {
     throw new Exception('连接不到数据库0.0');
   } else {
     return $result;
   }
}

function db_result_to_array($result) {
   $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
 }
 ?>
