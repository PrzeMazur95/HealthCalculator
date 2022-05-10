<?php
include_once "autoloader.inc.php";


if(isset($_POST['submit'])){

    $name = $_POST["name"];
    $kcal = $_POST["kcal"]; 
    $protein = $_POST["protein"];
    $animal_protein = $_POST["animal_protein"];
    $vegetable_protein = $_POST["vegetable_protein"];  
    $fat = $_POST["fat"];
    $saturated_fat = $_POST["saturated_fat"];
    $monounsaturated_fat = $_POST["monounsaturated_fat"];
    $polyunsaturated_fat = $_POST["polyunsaturated_fat"];
    $omega3_acid = $_POST["omega3_acid"]; 
    $omega6_acid = $_POST["omega6_acid"]; 
    $carbohydrates = $_POST["carbohydrates"];
    $net_carbohydrates = $_POST["net_carbohydrates"];
    $sugar = $_POST["sugar"];  
    $fiber = $_POST["fiber"]; 
    $salt = $_POST["salt"]; 
    $cholesterol = $_POST["cholesterol"]; 
    $witamin_k = $_POST["witamin_k"];
    $witamin_a = $_POST["witamin_a"];
    $witamin_b1 = $_POST["witamin_b1"];  
    $witamin_b2 = $_POST["witamin_b2"];  
    $witamin_b5 = $_POST["witamin_b5"];
    $witamin_b6 = $_POST["witamin_b6"]; 
    $biotin = $_POST["biotin"];
    $folic_acid = $_POST["folic_acid"];  
    $witamin_b12 = $_POST["witamin_b12"];  
    $witamin_c = $_POST["witamin_c"];  
    $witamin_d = $_POST["witamin_d"];  
    $witamin_e = $_POST["witamin_e"]; 
    $witamin_pp = $_POST["witamin_pp"];
    $calcium = $_POST["calcium"];
    $chlorine = $_POST["chlorine"];
    $magnesium = $_POST["magnesium"];
    $phosphorus = $_POST["phosphorus"];
    $potassium = $_POST["potassium"]; 
    $sodium = $_POST["sodium"];
    $iron = $_POST["iron"];
    $zinc = $_POST["zinc"];
    $copper = $_POST["copper"];
    $manganese = $_POST["manganese"];
    $molybdenum = $_POST["molybdenum"];
    $iodine = $_POST["iodine"];
    $fluorine = $_POST["fluorine"];
    $chrome = $_POST["chrome"]; 
    $selenium = $_POST["selenium"];
    $description = $_POST["description"];


    // echo $name."</br>";
    // echo $kcal."</br>"; 
    // echo $protein."</br>";  
    // echo $animal_protein."</br>";
    // echo $vegetable_protein."</br>";
    // echo $fat."</br>"; 
    // echo $saturated_fat."</br>";
    // echo $monounsaturated_fat."</br>";
    // echo $polyunsaturated_fat."</br>";
    // echo $omega3_acid."</br>"; 
    // echo $omega6_acid."</br>";
    // echo $carbohydrates."</br>"; 
    // echo $net_carbohydrates."</br>";
    // echo $sugar."</br>"; 
    // echo $fiber."</br>";
    // echo $salt."</br>";
    // echo $cholesterol."</br>";
    // echo $witamin_k."</br>";
    // echo $witamin_a."</br>"; 
    // echo $witamin_b1."</br>"; 
    // echo $witamin_b2."</br>";  
    // echo $witamin_b5."</br>";
    // echo $witamin_b6."</br>";
    // echo $biotin."</br>";  
    // echo $folic_acid."</br>";
    // echo $witamin_b12."</br>"; 
    // echo $witamin_c."</br>";  
    // echo $witamin_d."</br>";
    // echo $witamin_e."</br>";
    // echo $witamin_pp."</br>"; 
    // echo $calcium."</br>"; 
    // echo $chlorine."</br>";
    // echo $magnesium."</br>"; 
    // echo $phosphorus."</br>";
    // echo $potassium."</br>";
    // echo $sodium."</br>"; 
    // echo $iron."</br>"; 
    // echo $zinc."</br>"; 
    // echo $copper."</br>"; 
    // echo $manganese."</br>"; 
    // echo $molybdenum."</br>";
    // echo $iodine."</br>"; 
    // echo $fluorine."</br>";
    // echo $chrome."</br>";
    // echo $selenium."</br>";
    // echo $description."</br>";


}


//     if(empty($name) || empty($kcal) || empty($protein) || empty($fat) || empty($carbohydrates) || empty($sugar)){
//         header("location: ../products.php?error=emptyfields");
        

//     }else{
        
//         $newProduct = new productController($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol,  $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description);

//         $newProduct->addProduct();

//         header("location: ../product.php?error=none");
        
//     }


// }else{

//     echo "location: ../product.php?error=stmt";
// }


?>