<?php

class CalculatorController extends Calculator {

    private $userId;
    private $productId;
    private $data;
    private $quantity;

    
    public function newMeal($userId, $productId, $quantity){

        $this->userId = htmlspecialchars(trim($userId));
        $this->productId = htmlspecialchars(trim($productId));
        $this->quantity = htmlspecialchars(trim($quantity));

        $this->setData();

        if(!$this->emptyInput()){

            header("location: ../calculator.php?error=emptyinput");
            exit();

        }

        $this->setMeal($this->userId, $this->productId, $this->quantity, $this->data);
            
    }

    public function setData(){

        $this->data = date("y.m.d");

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