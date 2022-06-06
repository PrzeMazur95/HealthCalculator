<?php

class CalculatorView extends Calculator {
    
    public function showDailyUserResults($date, $userId){

        $results = $this->getMeals($date, $userId);

        if($results){

            return $results;
            exit();
            
        }else {

           echo '<div class="alert alert-info text-center" role="alert">';
            echo "Add your first meal!";
            echo "</div>";
        }

    }

}
?>