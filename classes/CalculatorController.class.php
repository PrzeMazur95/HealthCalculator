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

        echo $this->userId."</br>";
        echo $this->productId."</br>";
        echo $this->data."</br>";
        echo $this->quantity."</br>";

            
    }

    public function setData(){

        $this->data = date("m.d.y");

    }

}


?>