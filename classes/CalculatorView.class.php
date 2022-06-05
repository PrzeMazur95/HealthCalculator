<?php

class CalculatorView extends Calculator {
    
    public function showDailyUserResults($date, $userId){

        $results = $this->getMeals($date, $userId);

        if($results){

            return $results;
            exit();
        }else {

            echo "There was a problem with connection to DB, contact with admin!";
            exit();
        }

    }

}
?>