<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include_once 'album_fns.php';
    require_once 'output_fns.php';
    session_start();

    @$catid=$_GET['catid'];

    $name = get_category_name($catid);

    $albums_array = get_albums($catid);

    display_albums($albums_array);
     ?>

  </body>
</html>
