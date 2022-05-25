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

    $Results = new DbObjectView();

    $Products = $Results->Find_by_name($table, $search);

    if(!$Products){

        echo "Sorry, we do not have this product";
    
    } else {
    
        foreach ($Products as $row) {
    
            echo $row['name'];
            echo $row['id']."</br>";
    
        }
    
    }
    
} else {
    
    header("location: index.php");
    
}