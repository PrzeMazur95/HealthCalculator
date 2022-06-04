<?php

class Calculator extends Dbh {

    protected function setMeal($userId, $productId, $quantity, $date){

        $stmt = $this->connect()->prepare('INSERT INTO Calculator (user_id, product_id, quantity, datte) VALUES (?,?,?,?)');

        if(!$stmt->execute(array($userId, $productId, $quantity, $date))){

            $stmt = null;
            
            echo "<div class='alert alert-danger text-center' role='alert'>";
                                         
                echo "Something went wrong with Db connection, contact with admin!";
                    
            echo "</div>";

        }

        $stmt = null;

        echo "<div class='alert alert-success text-center' role='alert' id='addedInfo'>";

            echo "Succes! You have added a meal!"; 

         echo "</div>";

    }

    protected function getMeals($date, $userId){

        $stmt = $this->connect()->prepare('SELECT Products.*, Calculator.* FROM Products, Calculator WHERE Products.id = Calculator.product_id AND Calculator.user_id=? AND Calculator.datte="?"');

        $stmt->execute([$user_id, $date]);

        $results = $stmt->fetchAll();
        
        if(!$results){

            return false;
            $stmt = null;
            exit();

        } else {

            return $results;
            $stmt = null;
            exit();

        }
    }
    
}
?>
