<?php 

session_start();

include_once "autoloader.inc.php";

if(!isset($_SESSION['username'])){

    header("location: login.php?error=loginfirst");
}


if(isset($_POST['Calculator_edit_product_quantity'])){

    $edit = new DbObjectController();
    $editResult = $edit->EditDbRow($_POST['id'], $_POST['Calculator_edit_product_quantity'], $_SESSION['userid']);
    print_r($editResult[0]['quantity']);
    die();
}

if(isset($_POST['update_quantity_button'])){

    $newQuantity = $_POST['new_quantity'];
    $productId = $_POST['product_id'];

    echo $newQuantity;
    echo $productId;
    die();
// print_r($_POST);
// die();

}



?>
