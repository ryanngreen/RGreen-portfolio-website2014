<?php include('inc/shoots.php');
$pageTitle = "Timeless Vintage Rentals";
$section = "portfolio";
include('inc/header.php');?>
  <script src="js/jssor.slider.mini.js"></script>

  <div class="main-content port">
    <div class="left-content portfolio-nav">
      <ul>
        <?php foreach($shoots as $shootID => $shoot) { ?>
        <li><a href='portfolio.php?id=<?php echo $shootID; ?>' class="<?php if ($_GET["id"] == $shootID) { echo "current"; } ?>"><?php echo $shoot['name']; ?></a></li>
      <?php }; ?>
      </ul>
    </div>

    <div class="right-content">
      <div id="slider1_container" style="background: #eee; position: relative; top: 0px; left: 0px; width: 600px; height: 450px; overflow: hidden;">
        <!-- Slides Container -->
        <div u="slides" style="position: absolute; overflow: hidden; left: 0px; top: 0px; width: 600px; height: 450px;">
            <?php  if (!$_GET) { ?> 
              <script>var url = "portfolio.php?id=01";
                $(location).attr('href',url);</script>
            <?php  }  else  { 
            foreach($shoots as $shootID => $shoot) { 
              if($_GET["id"] == $shootID) { 
                foreach($shoot['img'] as $img) { ?>
                    <div><img u="image" src="<?php echo $img; ?>" alt="<?php echo $shoot['name']; ?>" id="slideshow" ></div>
            <?php }}} ?>
        </div>
    <!-- Arrow Navigator Skin Begin -->
    <style>
      /* jssor slider arrow navigator skin 21 css */
      /*
      .jssora21l              (normal)
      .jssora21r              (normal)
      .jssora21l:hover        (normal mouseover)
      .jssora21r:hover        (normal mouseover)
      .jssora21ldn            (mousedown)
      .jssora21rdn            (mousedown)
      */
      .jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn
      {
          position: absolute;
          cursor: pointer;
          display: block;
          background: url(img/a21.png) center center no-repeat;
          overflow: hidden;
      }
      .jssora21l { background-position: -3px -33px; }
      .jssora21r { background-position: -63px -33px; }
      .jssora21l:hover { background-position: -123px -33px; }
      .jssora21r:hover { background-position: -183px -33px; }
      .jssora21ldn { background-position: -243px -33px; }
      .jssora21rdn { background-position: -303px -33px; }
    </style>
    <!-- Arrow Left -->
    <span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 40%; left: 8px;">
    </span>
    <!-- Arrow Right -->
    <span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 40%; right: 8px">
    </span>
    <!-- Arrow Navigator Skin End -->
      <?php }; ?>
      <script>jssor_slider1_starter('slider1_container');</script>
  </div>
    </div>
  </div>
</div>

<script>
jQuery(document).ready(function ($) {
  var options = {
    $ArrowNavigatorOptions: {
      $Class: $JssorArrowNavigator$,
      $ChanceToShow: 2,
    },
    $FillMode: 1
  };
  var jssor_slider1 = new $JssorSlider$('slider1_container', options);
  //responsive code begin
  //you can remove responsive code if you don't want the slider scales
  //while window resizes
  function ScaleSlider() {
      var parentWidth = $('#slider1_container').parent().width();
      if (parentWidth) {
          jssor_slider1.$SetScaleWidth(parentWidth);
      }
      else
          window.setTimeout(ScaleSlider, 30);
  }
  //Scale slider after document ready
  ScaleSlider();
  $(window).bind('resize', ScaleSlider);
  
  //responsive code end
});
</script> 

<?php 
include('inc/footer.php') ?>