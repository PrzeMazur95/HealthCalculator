<?php
include_once "autoloader.inc.php";

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $pwdRepeat = $_POST['passwordconfirm'];


        $signup = new UserController($username, $pwd, $pwdRepeat, $email);

        $signup->signupUser();

        header("location: ../login.php");

    }

?>