<?php

session_start();


if (isset($_SESSION["username"]) && $_SESSION["user_id"]) {
    header("location:dashboard.php");

} else {



    include("./login.php");
}



?>