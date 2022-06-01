<?php

class Calculator extends Dbh {

    protected function setMeal($userId, $productId, $quantity, $date){

        $stmt = $this->connect()->prepare('INSERT INTO Calculator (user_id, product_id, quantity, datte) VALUES (?,?,?,?)');

    }
    
}
?>

