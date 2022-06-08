<?php 

session_start();

include_once "autoloader.inc.php";

if(!isset($_SESSION['username'])){

    header("location: login.php?error=loginfirst");
}

if(isset($_GET['id'])){

    if($_GET['table']=="Weight"){

        $delete = new DbObjectController();

        $result = $delete->DeleteDbRow($_GET['table'], $_GET['id'], $_GET['userid']);

        if($result){

            header ("location: ../weight.php?info=deleted");

        } else {

            header ("location: ../weight.php?error=db");    

        }

    }elseif($_GET['table']=="Products"){

        $product = new DbObjectView();
        
        $specific_product = $product->Find_by_id($_GET['table'], $_GET['id'], $_GET['userid']);

        if($specific_product[0]['user_id'] === $_SESSION['userid']){

            $deleteDbRow = new DbObjectController();

            if($deleteDbRow->DeleteDbRow($_GET['table'], $_GET['id'], $_GET['userid']) && $deletePhoto = ProductController::deletePhoto($specific_product[0]['filename'])){ 

                    header("location: ../products.php?info=deleted");

                } else {

                    header("location: ../products.php?error=stmtfailed");
                    
                }

        } else {

            header("location: ../products.php?error=id");

        }

    }elseif($_GET['table']=="Calculator"){

        $meal = new DbObjectView();

        $specific_meal = $meal->Find_by_id($_GET['table'], $_GET['id'], $_GET['userid']);
        
    }else{

        header ("location: ../index.php");

    }

} else {

    header ("location: ../index.php");

}

?>