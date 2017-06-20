<?php

/**
 * @author switch
 * @copyright 2015
 * 网站首页，显示系统中的图书目录
 */
    //require_once语句和require语句完全相同,唯一区别是PHP会检查该文件是否已经被包含过,如果是则不会再次包含。
    require_once('album_fns.php');

    session_start();    //开始会话
  //  do_html_header('Welcome to Book-O-Rama');   //页头

    echo "<p>Please choose a category:</p>";

    $cat_array = get_categories();  //从数据库获取目录

    display_categories($cat_array); //显示目录链接

  //  do_html_footer();   //页尾
?>
