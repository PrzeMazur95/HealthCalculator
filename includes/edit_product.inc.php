<?php
include_once "autoloader.inc.php";

session_start();

$properties=array();

$mainInformations = array('Name'=>'name', 'kCal'=>'kcal', 'Protein'=>'protein', 'Carbs'=>'carbohydrates', 'Fat'=>'fat');

$additionalFields = array('Ani. Protein'=>'animal_protein', 'Vege. Protein'=>'vegetable_protein', 'Sat. Fat'=>'saturated_fat', 
'Mono_Fat'=>'monounsaturated_fat', 'Poly Fat'=>'polyunsaturated_fat', 'Omega3'=>'omega3_acid', 'Omega6'=>'omega6_acid', 
'Netto Carbs'=>'net_carbohydrates', 'Fiber'=>'fiber', 'Salt'=>'salt', 'Cholesterol'=>'cholesterol', 
'Witamin K'=>'witamin_k', 'Witamin A'=>'witamin_a', 'Witamin B1'=>'witamin_b1', 'Witamin B2'=>'witamin_b2', 
'Witamin B5'=>'witamin_b5', 'Witamin B6'=>'witamin_b6', 'Biotin'=>'biotin', 'Folic Acid'=>'folic_acid', 
'Witamin B12'=>'witamin_b12', 'Witamin C'=>'witamin_c', 'Witamin D'=>'witamin_d', 'Witamin E'=>'witamin_e', 
'Witamin PP'=>'witamin_pp', 'Calcium'=>'calcium', 'Chlorine'=>'chlorine', 'Magnesium'=>'magnesium', 
'Phosphorus'=>'phosphorus', 'Potassium'=>'potassium', 'Sodium'=>'sodium', 'Iron'=>'iron', 
'Zinc'=>'zinc', 'Copper'=>'copper', 'Manganese'=>'manganese', 'Molybdenum'=>'molybdenum', 
'Iodine'=>'iodine', 'Fluorine'=>'fluorine', 'Chrome'=>'chrome', 'Selenium'=>'selenium');

if(isset($_POST['update'])){

    foreach ($mainInformations as $key => $value){

        $properties[$key]=$_POST[$value];

    }

    foreach ($additionalFields as $key => $value){

        if(strpos($key, '.')){
                
            $key = str_replace(".", "_", $key);
            $properties[$key]=$_POST[$value];
        } elseif (strpos($key, '. ')){

            $key = str_replace(". ", "_", $key);
            $properties[$key]=$_POST[$value];
        } elseif (strpos($key, ' ')){

            $key = str_replace(" ", "_", $key);
            $properties[$key]=$_POST[$value];
        } else {

            $key = $key;
            $properties[$key]=$_POST[$value];

        }

    }

    $properties['filename']=$_FILES['photo']['name'];

    print_r($properties);
    die();  
   

}


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
    $photo = $_FILES['photo'];
    $_SESSION['error'] = "";
    $userid = $_SESSION['userid'];
 
    $file = new ProductController($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol, $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description, $userid);

    if(!$file->set_file($photo)){

        $_SESSION['error'] = $file->errors[0];
        header("location: ../add_product.php?error=photo");
        
    } 

    if($file->save()){

        $_SESSION['error'] = "";
        header("location: ../add_product.php?info=properlyAdded");

    } else {
        $_SESSION['error'] = $file->errors[0];
        header("location: ../add_product.php?error=save");
    }

}

?>