<?php
// Initialize the session (in index)
session_start();
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ../index.php?content=home");
exit;
?>