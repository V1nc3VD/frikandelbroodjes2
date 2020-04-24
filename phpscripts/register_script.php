<?php 
if (empty($_POST["email"])) {
    header("Location: ./index.php?content=message&alert=no-email");
}

else if (empty($_POST["nickname"])) {
    print("geen nickname ingevoerd");

} 

else if (empty($_POST["password"])) {
    print("geen wachtwoord ingevoerd");
}



else {

    include("./connect_db.php");
    include("./functions.php");
    $email = sanitize($_POST["email"]);
    $password = sanitize($_POST["password"]);
    $passwordverify = sanitize($_POST["password-verify"]);
    $nickname = sanitize($_POST["nickname"]);

    $sql = "SELECT * FROM `register` WHERE `email` = '{$email}'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)) {
        header("Location: ./index.php?content=message&alert=emailexists");
    }
    else if ($password != $passwordverify) {
        print("wachtwoorden komen niet overeen");
    }
    else {
        print("success!");
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
    
        $sql = "INSERT INTO `REGISTER` (`USER_ID`, `email`, `password`, `nickname`,`userrole`)
                VALUES (NULL, '{$email}', '{$password_hash}', '{$nickname}', 'gebruiker')";

                mysqli_query($conn, $sql);
    }

   // if (mysqli_query($conn, $sql)) {
      //  mail("test@gmail.com", "Dit is een test", "hallo");
    //}
        

}



?>