<?php include('inc/shoots.php');
$pageTitle = "Timeless Vintage Rentals";
$section = "portfolio";
include('inc/header.php');?>

  <div class="main-content port">
    <div class="left-content portfolio-nav">
      <ul>
        <?php foreach($shoots as $shootID => $shoot) { ?>
        <li><a href='portfolio.php?id=<?php echo $shootID; ?>' class="<?php if ($_GET["id"] == $shootID) { echo "current"; } ?>"><?php echo $shoot['name']; ?></a></li>
      <?php }; ?>
      </ul>
    </div>

    <div class="right-content">
      <div class="slideshow-container">
        <?php  if (!$_GET) { ?> 
          <div class="empty"></div> 
        <?php  }  else  { 
        foreach($shoots as $shootID => $shoot) { 
          if($_GET["id"] == $shootID) { 
            foreach($shoot['img'] as $img) break; ?>
                <img src="<?php echo $img; ?>" alt="<?php echo $shoot['name']; ?>" id="slideshow" >
        <?php }} ?>
      </div>
    <div id="rightArrow" style="cursor: pointer;"><p>&#10093;</p></div>
    <div id="leftArrow" style="cursor: pointer;"><p>&#10092;</p></div>
  </div>
    <?php }; ?>
  </div>
</div>

<script>
$(document).ready(function(){
    
  images = [<?php foreach($shoots as $shootID => $shoot) { 
        if($_GET["id"] == $shootID) { 
          foreach($shoot['img'] as $img) {
            echo json_encode($img, JSON_UNESCAPED_SLASHES) . ",";}}} ?>];
  
  // Starts the animation
  
   // Arrow Functions
  $('#rightArrow').click(function() {
    forwardImage();
  });
  
  $('#leftArrow').click(function() {
    backwardsImage();
  });
    
    
  function currentImageKey() {
    i = jQuery.inArray($('#slideshow').attr('src'), images)
    return i;
  };
  
  
  function forwardImage() {
    currentImageKey();
    if (i < images.length - 1) {
      changeImage(i + 1);
    } else {
      changeImage(0);
    }
    checkArrows(i+1);
  };
  
  function backwardsImage() {
    currentImageKey();
    if (i === 0) {
      changeImage(images.length - 1);
    } else {
      changeImage(i - 1);
    }
    checkArrows(i-1);
  };
  
    
    // Checks Arrows
  function checkArrows(i) {
    if (i == 0) {
      $('#leftArrow').css('display', 'none');
      $('#rightArrow').css('display', 'inline');
    } else if (i == images.length - 1) {
      $('#rightArrow').css('display', 'none');
      $('#leftArrow').css('display', 'inline');
    } else {
      $('#rightArrow').css('display', 'inline');
      $('#leftArrow').css('display', 'inline');
    }
  };
  
  function changeImage(i) {
    $('#slideshow').stop().animate(20, function() {
      $('#slideshow').attr('src', images[i]);
      $('#main-content img').load(function() {
        $('#slideshow').stop().animate(20)
        })
      })
    };
});
</script> 

<?php 
include('inc/footer.php') ?>