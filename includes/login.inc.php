<?php
include_once "autoloader.inc.php";

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $pwdRepeat = "unnecesary";
        $email = "unnecesary";

        $logIn = new UserController($username, $pwd, $pwdRepeat, $email);

        $logIn -> loginUser();

        header("location: ../index.php");

    }

?>