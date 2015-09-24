<?php include('inc/sections.php');
include('inc/itemarray.php');
$pageTitle = "Timeless Vintage Rentals Inventory";
$section = "inventory";
include('inc/header.php'); ?>

<?php if(isset($_GET["id"])) {
  $itemID = $_GET["id"];
  if (isset($items[$itemID])) {
    $item = $items[$itemID];
  }
} ?>

  <div class="main-content specific">
    
      <div class="breadcrumb"><a href="inventory.php">Inventory</a> &gt; <a href="items.php?selector=<?php echo $item['selector'] ?>"><?php echo $item['selector'] ?></a> &gt; <?php echo $item["name"]; ?></div>
      
      <div class="left-content">
            <img id="main-image" src="<?php echo $item["slides"][0]; ?>" alt="<?php echo $item["name"]; ?>">

        <div class="gallery">
          <ul>
            <?php foreach($item['slides'] as $slide) { ?>
              <li><a href=""><img class="thumbimg" src="<?php echo $slide; ?>" alt="<?php echo $item['name'] ?>"></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      
      <div class="right-content">
        <div class="details">
          <hr>

          <h3><?php echo $item["name"]; ?></h3>
          <p><?php echo $item["description"] ?></p>
          <p class="item-details">Quantity: <?php echo $item["quantity"] ?></p>
          <p class="item-details">Dimensions: <?php echo $item["dimensions"] ?></p>

          <hr>

          <p><span>* Prices listed do not include delivery. We do offer delivery, set up and pick up for a fee if needed. <br>
            * Discounts are applied beginning at $500 up to 20%.</span></p>

        </div>
      </div>
  </div>

<script>
$('.gallery img').load(function () {
  $('.gallery img').each(function() {
    if ($(this).width() > $(this).height()) {
      $(this).addClass('landscape');        
    }
  });
});  
  
$(document).ready(function() {

// Click image thumbnail
  $('.thumbimg').click(function() {
    event.preventDefault();
    // Replaces src #main-image w/ src of clicked thumbnail
    $('#main-image').attr("src", $(this).attr('src'));
  });
});
</script>
<?php
include('inc/footer.php'); ?>