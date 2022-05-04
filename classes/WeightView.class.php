<?php

class WeightView extends Weight {
    
    public function showWeight($user_id){

        $results = $this->getWeight($user_id);

        return $results;

    }

}
?>