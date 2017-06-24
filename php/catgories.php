<?php
  require_once('album_fns.php');
  session_start();

  do_html_header();?>
  <div class="wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="catgories-title">
            <p>全部专辑分类</p>
          </div>
        </div>
      </div>
    </div>
    <div class="catgories-content">
       <?php
       $cat_array = get_categories();
       display_categories($cat_array);
        ?>
    </div>
  </div>

<?php
do_html_footer();
?>
<script type="text/javascript">

  $(".list-group").children("a").addClass("list-group-item");
  $("a.list-group-item").hover(function(){
  $(this).addClass("active");
 },
  function(){
    $(this).removeClass("active");
  }
)
</script>
