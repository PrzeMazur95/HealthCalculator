<?php 

include_once "autoloader.inc.php";

if(!isset($_SESSION['username'])){

    header("location: login.php?error=loginfirst");
}

if(isset($_GET['id'])){

    if($_GET['table']=="Weight"){

        $table = $_GET['table'];
        $id = $_GET['id'];
        $userid = $_GET['userid'];

        $delete = new DbObjectController();

        $result = $delete->DeleteDbRow($_GET['table'], $_GET['id'], $_GET['userid']);

        if($result){

            header ("location: ../weight.php?info=deleted");

        } else {

            header ("location: ../weight.php?error=db");    

        }

    }elseif($_GET['table']=="product"){

        echo "FUTURE PHP CODE TO DELETE PRODUCTS";

    }else{

        header ("location: ../index.php");

    }

} else {

    header ("location: ../index.php");

}

?>