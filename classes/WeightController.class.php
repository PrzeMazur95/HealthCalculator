<?php

class WeightController extends Weight {

    private $user_id;
    private $weight;
    public $date;
    private $comment;
    public $id;

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


    public function updateResult(){

        if($this->emptyInput() == false){

            header("location: ../weight.php?error=emptyinput");
    
            exit();

        } else {

            if($this->updateWeight($this->user_id, $this->id, $this->weight, $this->date, $this->comment)){

                header("location: ../weight.php?info=edited");

            } else {

                header("location: ../weight.php?error=stmtfailed");

            }
            

            
            
        }

    }

}
    


?>