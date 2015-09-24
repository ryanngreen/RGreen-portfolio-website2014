<?php include('inc/sections.php'); 
include('inc/itemarray.php'); 
$pageTitle = "Timeless Vintage Rentals";
$section = "inventory";
include('inc/header.php'); ?>

  <div class="main-content items">
    <ul>
<?php foreach($items as $itemID => $item) {
    if($_GET["selector"] == $item['selector']) { ?>
      <li><a href='item.php?id=<?php echo $itemID; ?>'><img src='<?php echo $item['imgunhover'];?>' alt='<?php $item['name'];?>' onmouseover="this.src='<?php echo $item['imghover'];?>';" onmouseout="this.src = '<?php echo $item['imgunhover'];?>';"/></a></li>
    <?php };} ?>
    </ul>
  </div>
  
<?php
include('inc/footer.php'); ?>