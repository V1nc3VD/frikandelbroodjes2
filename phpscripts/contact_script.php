<?php
if (empty($_POST["email"]) && (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true))
{
    print("geen email ingevoerd en niet ingelogd.");
}

else {

    include("./connect_db.php");
    include("./functions.php");
    $email = sanitize($_POST["email"]);
    $bericht = sanitize($_POST["bericht"]);

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
        $userid = $_SESSION["USER_ID"];   
    }
    else {
        $userid = "NULL";
    }



    $sql = "INSERT INTO `berichten` (`MESSAGE_ID`, `USER_ID`, `CONTACTEMAIL`, `MESSAGE`)
            VALUES (NULL, {$userid}, '{$email}', '{$bericht}')";
            mysqli_query($conn, $sql);
            header('Location: ../index.php?content=contact');

    }
