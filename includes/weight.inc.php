<?php
include_once "autoloader.inc.php";
session_start();

    if(isset($_POST['submit'])){

        if(empty($_POST['weight'])){

            header("location: ../weight.php?error=emptyweight");

        } else {

            if(strpos($_POST['weight'], '.')){
                
                $weight = str_replace(".", ",", $_POST['weight']);

            } else {

                $weight = $_POST['weight'];
            }

            $user_id = $_SESSION['userid'];
            $comment = $_POST['comment'];

            $weight = new WeightController($user_id, $weight, $comment);

            $weight->addWeight();

            header("location: ../weight.php?info=properlyAdded");

        }

    } else {

        header("location: ../weight.php?error=submit");

    }

?>