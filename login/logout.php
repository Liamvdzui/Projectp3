<?php
    session_start();
    // Destroy session
    unset($_SESSION["id"]);
    unset($_SESSION["userrole"]);
   
    if(session_destroy()) {
        // Redirecting To Home Page
        // var_dump($_SESSION); echo "Hoi"; exit();
        header("Location: login.php");
    }
?>