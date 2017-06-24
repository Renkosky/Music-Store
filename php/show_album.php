<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include_once 'album_fns.php';
    include_once 'output_fns.php';
    session_start();
    do_html_header();
    $isbn = $_GET['isbn'];
    $album_detail =get_album_details($isbn);
    display_albums_details($album_detail);
    do_html_footer();


    ?>
  </body>
</html>
