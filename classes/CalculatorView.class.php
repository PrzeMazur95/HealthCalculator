<?php

class CalculatorView extends Calculator {
    
    public function showDailyUserResults($date, $userId){

        $results = $this->getMeals($date, $userId);

        if($results){

            print_r($results);
        }else {

            echo "There was a problem with connection to DB, contact with admin!";
        }

    }

}
?>