<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>Ryann Green  |  Design + Develop</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="keywords" content="Graphic Design, Design, Publication, Web Design, HTML, CSS, JavaScript, Wordpress, Baton Rouge, Louisiana, Freelance, Freelancer, Small Business, Local">
    <meta name="description" content="I am a graphic designer and web developer in the Baton Rouge/New Orleans area. I specialize in publication design and web sites for small businesses.">
    <meta name="author" content="Ryann Green">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-59235137-1', 'auto');
      ga('send', 'pageview');

    </script>
    <!-- Hotjar Tracking Code for www.ryanngreen.com -->
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:103122,hjsv:5};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
	</script>

  </head>
  
  <body>
    
    <div class="sidebar slide-menu">
      <a href="index.html"><img class="logo" src="img/personallogo.png" alt="Ryann Green Logo" height="100px"></a>
      <nav>
        <ul>
          <li class="close-menu"><img src="img/close.png" alt="Close Menu"></li>
          <li><a href="index.html">Work</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <!-- <li><a href="blog.html">Blog</a></li>-->
        </ul>
      </nav>
    </div>
    <div id="menubar">
      <img class="toggle-slide" src="img/menu.png" alt="Menu">
    </div>
    
    <div class="module mail">
      <?php require_once('inc/PHPMailer/class.phpmailer.php');

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

        $body = "Name : " . $name . "<br>";
        $body = $body . "Email : " . $email . "<br>";
        $body = $body . "Message : " . $message;

        foreach($_POST as $value) {
          if (stripos($value,'Content-Type:') !== FALSE) {
            echo "There was a problem with the information you entered.";
            exit;
          }
        }

        if ($_POST["address"] != "") {
          echo "Your form submission has an error.";
          exit;
        }

        $mail = new PHPMailer;
      //  $mail->IsSMTP();
      //  $mail->SMTPAuth = true;
      //  $mail->Host = "smtp.sendgrid.net";
      //  $mail->Port = 587;
      //  $mail->Username = "rgreen";
      //  $mail->Password = "shabam12";

        $address = "me@ryanngreen.com";
        $mail->AddAddress($address, "Ryann Green");
        $mail->SetFrom($email, $name);

        $mail->From = $email;
        $mail->FromName = $name;

        $mail->WordWrap = 50;      // Set word wrap to 50 characters

        $mail->Subject = 'Design Inquiry | ' . $name;
        $mail->MsgHTML($body);
        $mail->Body    = $body;
        
        include_once 'inc/securimage/securimage.php';
        $securimage = new Securimage();

        if ($securimage->check($_POST['captcha_code']) == false) { ?>
          <p>The security code entered was incorrect.<br />
          Please go <a href='javascript:history.go(-1)'>back</a> and try again.</p>
          <?php exit; };
        
        if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else { ?>
          <p class="postmessage">Thanks for the email! I&rsquo;ll be in touch shortly.</p>
        <?php } }; ?>

      <div class="left">
        <p>Please contact me with any questions or inquiries. I will get back to you as quickly as possible.</p>


        <p>Ryann Green<br>
        me@ryanngreen.com<br>
        225-229-6689</p>
      </div>
      
      <div class="right">
        <form id="contactForm" method="post" action="contact.php">
          <table>
            <tr>
              <td><label for="name">Name *</label></td>
              <td><input class="field" type="text" name="name" id="name" required></td>
            </tr>
            <tr>
              <td><label for="email">Email *</label></td>
              <td><input class="field" type="text" name="email" id="email" required></td>
            </tr>
            <tr>
              <td><label for="message">Message *</label></td>
              <td><textarea rows="10" class="field" name="message" id="message" required></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td><p class="asterisk">* - required fields</p></td>
            </tr>
            <tr>
              <td><div style="display: none"><input type="text" name="address" id="address">
              <p>Humans: please leave this field blank.</p></div></td>
            </tr>
            <tr>
              <td></td>
              <td><img id="captcha" src="inc/securimage/securimage_show.php" alt="CAPTCHA Image" /></td>
            </tr>
            <tr>
              <td><label for="captcha_code">Enter Captcha</label></td>
              <td><input type="text" id="captcha_code" name="captcha_code" size="10" maxlength="6" /></td>
            </tr>
            <tr>
              <td></td>
              <td><a href="#" onclick="document.getElementById('captcha').src = 'inc/securimage/securimage_show.php?' + Math.random(); return false">Need a New Image?</a></td>
            </tr>
            <tr>
              <td></td>
              <td><input class="submit" type="submit" value="Send"></td>
            </tr>

          </table>
        </form>
      </div>
    </div>
    
    <script>
      // Click on .toggle slide
        $(".toggle-slide").click(function() {
          // Change .sidebar left css to 0px
          $(".sidebar").css("left", "0px");
        });
      // Click on .close-menu
        $(".close-menu").click(function() {
          // Change .sidebar left css to -300px
          $(".sidebar").css("left", "-300px");
        });
      
      $("#contactForm").validate({
        rules: {
          email: {
            required: true,
            email: true
          },
          name: {
            required: true
          },
          message: {
            required: true
          },
        }
      })
    </script>
    
  </body>
  
</html>