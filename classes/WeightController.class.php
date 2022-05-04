<?php

class WeightController extends Weight {

    private $user_id;
    private $weight;
    private $date;
    private $comment;

    public function __construct($user_id, $weight, $comment){


        $this->user_id = $user_id;
        $this->weight = $weight;
        $this->comment = $comment;
        $this->date = date("Y/m/d");

    }


    public function addWeight(){

        if($this->emptyInput() == false){

            header("location: ../weight.php?error=emptyinput");
            exit();

        }

        $this->setWeight($this->user_id, $this->weight, $this->date, $this->comment);

    }

    private function emptyInput(){

        $result;

        if(empty($this->user_id || $this->weight || $this->date)){

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }

}
    


?>