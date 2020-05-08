<?php
$alert = (isset($_GET["alert"]))? $_GET["alert"]: "default";
$alertmessage = "";
switch($alert) {
//foutmeldingen

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

case "emptypassword": 
    $alertmessage = '<div class="alert alert-warning" role="alert">
Je hebt geen wachtwoord ingevoerd.
</div>';
break;

case "emptynickname":
    $alertmessage = '<div class="alert alert-warning" role="alert">
Je hebt geen naam ingevoerd.
</div>';
break;

case "wrongpassword": 
    $alertmessage = '<div class="alert alert-warning" role="alert">
Het wachtwoord is fout.
</div>';
break;

case "wrongemail": 
    $alertmessage = '<div class="alert alert-warning" role="alert">
Er is geen account met dit email gevonden.
</div>';
break;

case "otherpassword": 
    $alertmessage = '<div class="alert alert-warning" role="alert">
Wachtwoorden komen niet overeen.
</div>';
break;

case "unknown":
    $alertmessage = '<div class="alert alert-warning" role="alert">
Er is iets fout gegaan. Probeer het later opnieuw of neem contact met ons op.
</div>';



}
