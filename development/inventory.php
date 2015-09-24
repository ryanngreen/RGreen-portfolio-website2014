<?php include('inc/sections.php');
$pageTitle = "Timeless Vintage Rentals";
$section = "inventory";
include('inc/header.php'); ?>

  <div class="main-content invent">
    <ul>
    <?php foreach($sections as $sectionID => $section) { ?>
      <li><a href='items.php?selector=<?php echo $section["selector"] ?>'><img src='<?php echo $section['imgunhover'];?>' alt='<?php $section['name'];?>' onmouseover="this.src='<?php echo $section['imghover'];?>';" onmouseout="this.src = '<?php echo $section['imgunhover'];?>';"/></a></li>
    <?php } ?>
    </ul>
    
    <p style="text-align: center;">* Please note that, due to our site renovation, not all inventory is listed. Check back to view more of our items as they are added. *</p>
  </div>

<?php 
include('inc/footer.php') ?>