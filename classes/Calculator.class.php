<?php

class Calculator extends Dbh {

    protected function setMeal($userId, $productId, $quantity, $date){

        $stmt = $this->connect()->prepare('INSERT INTO Calculator (user_id, product_id, quantity, datte) VALUES (?,?,?,?)');

        if(!$stmt->execute(array($userId, $productId, $quantity, $date))){

            $stmt = null;
            header("location: ../calculator.php?error=stmtfailed");

        }

        $stmt = null;
        header("location: ../calculator.php?info=properlyAdded");

    }
    
}
?>
