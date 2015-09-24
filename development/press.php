<?php include('inc/pressReleases.php');
$pageTitle = "Timeless Vintage Rentals";
$section = "press";
include('inc/header.php'); ?>

  <div class="main-content items pressRelease">
    <ul>
      <?php foreach($releases as $release) { ?>
          <li><a href="<?php echo $release['url'] ?>" target="_blank"><img src="<?php echo $release['unhover'] ?>" alt="<?php echo $release['location'] ?>" onmouseover="this.src = '<?php echo $release['hover'] ?>'" onmouseout="this.src = '<?php echo $release['unhover'] ?>'"><br><p><?php echo $release['date'] ?></p></a></li>
      <?php }; ?>
    </ul>
  </div>

<?php 
include('inc/footer.php') ?>