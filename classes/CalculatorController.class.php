<?php

class CalculatorController extends Calculator {

    private $userId;
    private $productId;
    private $data;
    private $quantity;

    
    public function setMeal($userId, $productId, $quantity){

        $this->userId = htmlspecialchars(trim($userId));
        $this->productId = htmlspecialchars(trim($productId));
        $this->quantity = htmlspecialchars(trim($quantity));

        $this->setData();

        if(!$this->emptyInput()){

            header("location: ../calculator.php?error=emptyinput");
            exit();

        }

        echo $this->userId."</br>";
        echo $this->productId."</br>";
        echo $this->data."</br>";
        echo $this->quantity."</br>";

            
    }

    public function setData(){

        $this->data = date("m.d.y");

    }

    public function emptyInput(){

        if(empty($this->userId) || empty($this->productId) || empty($this->quantity)){

            return false;

        }else{

            return true;

        }

    }

}


?>