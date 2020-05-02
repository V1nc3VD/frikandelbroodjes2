<?php
$alert = (isset($_GET["alert"]))? $_GET["alert"]: "default";
$alertmessage = "";
switch($alert) {
//foutmeldingen
case "no-email":
    $alertmessage = '<div class="alert alert-warning" role="alert">
    Je hebt geen email ingevoerd.
  </div>';

break;

case "emailexists":
    $alertmessage = '<div class="alert alert-warning" role="alert">
Er bestaat al een account op deze email. 
</div>';
break;

case "emptyemail":
    $alertmessage = '<div class="alert alert-warning" role="alert">
Je hebt geen email ingevoerd.
</div>';
break;

case "emtpypassword": 
    $alertmessage = '<div class="alert alert-warning" role="alert">
Je hebt geen wachtwoord ingevoerd.
</div>';
break;

case "wrongpassword": 
    $alertmessage = '<div class="alert alert-warning" role="alert">
Het wachtwoord is fout.
</div>';
break;


}
?>