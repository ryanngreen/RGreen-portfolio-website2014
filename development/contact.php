<?php
$pageTitle = "Timeless Vintage Rentals";
$section = "contact";
include('inc/header.php'); ?>
<script src="js/jquery.validate.min.js"></script>
<div class="main-content">
  <div class="left-content">

<?php require_once('inc/PHPMailer/class.phpmailer.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $date = trim($_POST['date']);
  $city = trim($_POST['city']);
  $message = trim($_POST['message']);
  
  $body = "Name : " . $name . "<br>";
  $body = $body . "Email : " . $email . "<br>";
  $body = $body . "Date : " . $date . "<br>";
  $body = $body . "City : " . $city . "<br>";
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

  $address = "green.ryann@gmail.com";
  $mail->AddAddress($address, "Ryann Green");
  $mail->SetFrom($email, $name);
  
  $mail->From = $email;
  $mail->FromName = $name;

  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters

  $mail->Subject = 'Timeless Vintage Request | ' . $name;
  $mail->MsgHTML($body);
  $mail->Body    = $body;
  
  if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else { ?>
    <p class="postmessage">Thanks for the email! I&rsquo;ll be in touch shortly.</p>
  <?php } }; ?>


    <p>Call and schedule a consultation with us. <br>
    We love to meet in person with clients to customize the perfect look for your event or photo shoot.</p>

    <hr>

    <p>Julie Guidry</p><br>
      <hr>
    <p>jguidry@timelessvintage.com<br>
    225-405-9711</p>
  </div>
  
  <div class="right-content">
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
          <td><label for="city">Event City</label></td>
          <td><input class="field" type="text" name="city" id="city"></td>
        </tr>
        <tr>
          <td><label for="date">Event Date</label></td>
          <td><input class="field" type="date" name="date" id="date"></td>
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
    
    <script>
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
  </div>
</div>

<?php 
include('inc/footer.php'); ?>