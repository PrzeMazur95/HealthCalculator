<?php 
session_start();
include_once "autoloader.inc.php";

if(!isset($_SESSION['username'])){

    header("location: login.php?error=loginfirst");
}


if(isset($_POST['search'])){

    if($_POST['table']=="products"){

        $search = $_POST['search'];
        $table = "Products";

    } else {

        header("location: calculator.php");

    }

}





