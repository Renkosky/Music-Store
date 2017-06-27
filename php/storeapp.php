<?php
require_once 'output_fns.php';
session_start();
if(!isset($_SESSION['cart']))   //购物车中无物品
{
    $_SESSION['cart'] =array();
    $_SESSION['items'] = 0;
    $_SESSION['total_price'] = '0.00';
}
do_html_header(); ?>
    <div class="titlewrap">
        <div class="layer">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12 storetitle">
                        一个属于你的音乐商店
                    </div>
                </div>
                <div class="site-text">
                    <p>在这里，你可以...</p>
                    </br>
                    <a href="#"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true" onclick="click_scroll()"></a>
            </div>
            </span></p>
                    </br>
                </div>
            </div>
        </div>

    <div class="section" id="movie2">
      <div class="layer">
        <div class="container text-center">
          <div class="row">
            <div class="col-md-12 storetitle" >
                在“梦之城”与TA相遇
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="button-white">
                  <a href="show_cat.php?catid=1">进入影视原声</a>
                </div>
              </div>
            </div>
          </div>
          <a href="#"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true" onclick="click_scroll2()"></a>
        </div>
      </div>
    </div>
    <div class="section" id="game">
      <div class="layer">
        <div class="container text-center">
          <div class="row">
            <div class="col-md-12 storetitle" >
                与“怪盗团”盗窃人心
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="button-white">
                  <a href="show_cat.php?catid=2">进入游戏原声</a>
                </div>
              </div>
            </div>
          </div>
          <a href="#"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true" onclick="click_scroll3()"></a>
        </div>
      </div>
    </div>
    <div class="section" id="movie1">
      <div class="layer">
        <div class="container text-center">
          <div class="row">
            <div class="col-md-12 storetitle">
                和jojo们来一场华丽的冒险
            </div>
          </div>
          <div class="col-md-12">
            <div class="button-white">
              <a href="show_cat.php?catid=3">进入动漫原声</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function click_scroll() {
          var s1Scroll_offset = $("#movie2").offset();
          var bodyScrolltop = $("body,html").scrollTop();
          $("body,html").animate({
            scrollTop:s1Scroll_offset.top //
          },1000);
        }
        function click_scroll2() {
          var s1Scroll_offset = $("#game").offset();
          var bodyScrolltop = $("body,html").scrollTop();
          $("body,html").animate({
            scrollTop:s1Scroll_offset.top //
          },1000);
        }
          function click_scroll3() {
            var s1Scroll_offset = $("#movie1").offset();
            var bodyScrolltop = $("body,html").scrollTop();
            $("body,html").animate({
              scrollTop:s1Scroll_offset.top //
            },1000);
        }
</script>
<?php do_html_footer(); ?>
