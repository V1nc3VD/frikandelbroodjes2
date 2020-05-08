<?php
// Initialize the session
//include("connect_db.php");
include("./functions.php");

 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php?content=home");
    exit;
}
 
// Include config file
require_once "./connect_db.php";
 
// Define variables and initialize with empty values
$email = $password = $userrole = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if EMAIL is empty
    if(empty(trim($_POST["email"]))){
        header("Location: ../index.php?content=login&alert=emptyemail");
        $email_err = true;
    } else{
        $email = sanitize($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        header("Location: ../index.php?content=login&alert=emptypassword");
        $password_err = true;
    } else{
        $password = sanitize($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT USER_ID, email, nickname, password, userrole FROM register WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $username, $hashed_password, $userrole);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["USER_ID"] = $id;
                            $_SESSION["email"] = $email;   
                            $_SESSION["username"] = $username; 
                            $_SESSION["userrole"] = $userrole; 
             
                            
                            // Redirect user to welcome page
                            header("location:  ../index.php?content=home");
                        } else{
                            // Display an error message if password is not valid
                            header("Location: ../index.php?content=login&alert=wrongpassword");
                        }
                    }
                } else{
                    // Display an error message if email doesn't exist
                    header("Location: ../index.php?content=login&alert=wrongemail");
                }
            } else{
                header("Location: ../index.php?content=login&alert=unknown");
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    }
    print("$email_err, $password_err");
        
        $_SESSION["isstaff"] = false;
        if ($userrole == "admin" || $userrole == "moderator" || $userrole == "superadmin" || $userrole == "root" || $userrole == "helper") {
            $_SESSION["isstaff"] = true;

    }
    exit;
    
    // Close connection
    mysqli_close($conn);
}