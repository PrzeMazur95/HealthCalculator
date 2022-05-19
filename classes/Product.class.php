<?php

class Product extends Dbh {

    protected function setProduct($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol, $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description){


        $sql = "INSERT INTO Products (name,  kcal,  protein,  animal_protein, vegetable_protein,  fat,  saturated_fat,  monounsaturated_fat, polyunsaturated_fat, omega3_acid, omega6_acid, carbohydrates, net_carbohydrates, sugar,  fiber,  salt, cholesterol,  witamin_k, witamin_a, witamin_b1,  witamin_b2,  witamin_b5, witamin_b6,  biotin,  folic_acid,  witamin_b12,  witamin_c,  witamin_d,  witamin_e, witamin_pp, calcium, chlorine, magnesium, phosphorus, potassium, sodium, iron, zinc, copper,  manganese, molybdenum, iodine, fluorine, chrome, selenium, description) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol, $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description))){
            // print_r($stmt->errorInfo());
            // die();
            $stmt=null;
            return false;
            exit(); 

            header("location: ../product.php?error=stmtfailed");
            
            
        } else {

            $stmt=null;
            return true;
            exit();

        }

 
    }

    protected function setProductAndPhoto($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol, $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description, $filename, $userid){


        $sql = "INSERT INTO Products (name,  kcal,  protein,  animal_protein, vegetable_protein,  fat,  saturated_fat,  monounsaturated_fat, polyunsaturated_fat, omega3_acid, omega6_acid, carbohydrates, net_carbohydrates, sugar,  fiber,  salt, cholesterol,  witamin_k, witamin_a, witamin_b1,  witamin_b2,  witamin_b5, witamin_b6,  biotin,  folic_acid,  witamin_b12,  witamin_c,  witamin_d,  witamin_e, witamin_pp, calcium, chlorine, magnesium, phosphorus, potassium, sodium, iron, zinc, copper,  manganese, molybdenum, iodine, fluorine, chrome, selenium, description, filename, user_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol, $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description, $filename, $userid))){
            // print_r($stmt->errorInfo());
            // die();
            $stmt=null;
            return false;
            exit(); 

            header("location: ../add_product.php?error=stmtfailed");
            
            
        } else {

            $stmt=null;
            return true;
            exit();

        }

 
    }

    protected function dbUpdateProductAndPhoto($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol, $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description, $filename, $userid, $id){

        $sql = "UPDATE Products SET name =?,  kcal=?,  protein=?,  animal_protein=?, vegetable_protein=?,  fat=?,  saturated_fat=?,  monounsaturated_fat=?, polyunsaturated_fat=?, omega3_acid=?, omega6_acid=?, carbohydrates=?, net_carbohydrates=?, sugar=?,  fiber=?,  salt=?, cholesterol=?,  witamin_k=?, witamin_a=?, witamin_b1=?,  witamin_b2=?,  witamin_b5=?, witamin_b6=?,  biotin=?,  folic_acid=?,  witamin_b12=?,  witamin_c=?,  witamin_d=?,  witamin_e=?, witamin_pp=?, calcium=?, chlorine=?, magnesium=?, phosphorus=?, potassium=?, sodium=?, iron=?, zinc=?, copper=?,  manganese=?, molybdenum=?, iodine=?, fluorine=?, chrome=?, selenium=?, description=?, filename=?, user_id=? WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol, $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description, $filename, $userid, $id))){
            $stmt=null;
            return false;
            exit(); 

            header("location: ../add_product.php?error=stmtfailed");
            
            
        } else {

            $stmt=null;
            return true;
            exit();

        }

 
    }


    protected function getProducts(){

        $sql = "SELECT * FROM Products";
        $stmt = $this->connect()->query($sql);
        $results = $stmt->fetchAll();

        if(!$results){

            return false;

        } else {

            return $results;

        }

    }

    

}
?>