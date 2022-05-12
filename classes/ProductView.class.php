<?php

class ProductView extends Product {
    
    public function showProducts(){

        $results = $this->getProducts();

        return $results;

    }

}
?>