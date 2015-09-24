<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Lato|Lora:400,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<body>

	<div class="header">

      <div class="logo"><a href="index.php"><img src="img/logo.png" alt="Timeless Vintage Rentals Logo"></a></div>

      <ul class="nav">
        <li class="about"><a href="index.php" class="<?php if ($section == "home") { echo "current"; } ?>">Home</a></li>
        <li class="about"><a href="about.php" class="<?php if ($section == "about") { echo "current"; } ?>">About</a></li>
        <li class="services"><a href="services.php" class="<?php if ($section == "services") { echo "current"; } ?>">Services</a></li>
        <li class="inventory"><a href="inventory.php" class="<?php if ($section == "inventory") { echo "current"; } ?>">Inventory</a></li>
        <li class="portfolio"><a href="portfolio.php" class="<?php if ($section == "portfolio") { echo "current"; } ?>">Portfolio</a></li>
        <li class="press"><a href="press.php" class="<?php if ($section == "press") { echo "current"; } ?>">Press</a></li>
        <li class="contact"><a href="contact.php" class="<?php if ($section == "contact") { echo "current"; } ?>">Contact</a></li>
      </ul>

	</div>

	<div id="content">