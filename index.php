<?php
// Initialize the session
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if ($_SESSION["username"] == "Admin") {
        header("location: cervg/users/admin/index.php");
        exit;
    } elseif ($_SESSION["username"] == "Hannah187") {
        header("location: cervg/users/hannah/index.php");
        exit;
    } elseif ($_SESSION["username"] == "InsfireeMan") {
        header("location: cervg/users/marise/index.php");
        exit;
    } else {
        header("location: cervg/users/guest/index.php");
        exit;
    }
} else {
    header("location: login.php");
}

?>
