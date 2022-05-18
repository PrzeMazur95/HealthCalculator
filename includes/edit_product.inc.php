<?php
include_once "autoloader.inc.php";

session_start();

$properties=array();

$mainInformations = array('Name'=>'name', 'kCal'=>'kcal', 'Protein'=>'protein', 'Carbs'=>'carbohydrates', 'Fat'=>'fat', 'Sugar'=>'sugar');

$additionalFields = array('Ani. Protein'=>'animal_protein', 'Vege. Protein'=>'vegetable_protein', 'Sat. Fat'=>'saturated_fat', 
'Mono_Fat'=>'monounsaturated_fat', 'Poly Fat'=>'polyunsaturated_fat', 'Omega3'=>'omega3_acid', 'Omega6'=>'omega6_acid', 
'Netto Carbs'=>'net_carbohydrates', 'Fiber'=>'fiber', 'Salt'=>'salt', 'Cholesterol'=>'cholesterol', 
'Witamin K'=>'witamin_k', 'Witamin A'=>'witamin_a', 'Witamin B1'=>'witamin_b1', 'Witamin B2'=>'witamin_b2', 
'Witamin B5'=>'witamin_b5', 'Witamin B6'=>'witamin_b6', 'Biotin'=>'biotin', 'Folic Acid'=>'folic_acid', 
'Witamin B12'=>'witamin_b12', 'Witamin C'=>'witamin_c', 'Witamin D'=>'witamin_d', 'Witamin E'=>'witamin_e', 
'Witamin PP'=>'witamin_pp', 'Calcium'=>'calcium', 'Chlorine'=>'chlorine', 'Magnesium'=>'magnesium', 
'Phosphorus'=>'phosphorus', 'Potassium'=>'potassium', 'Sodium'=>'sodium', 'Iron'=>'iron', 
'Zinc'=>'zinc', 'Copper'=>'copper', 'Manganese'=>'manganese', 'Molybdenum'=>'molybdenum', 
'Iodine'=>'iodine', 'Fluorine'=>'fluorine', 'Chrome'=>'chrome', 'Selenium'=>'selenium', 'Description'=>'description','Old_picture'=>'oldpicture');

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
    $properties['userid']=$_SESSION['userid'];

    // print_r($properties);
    // die();  
   

}

 
     $updatedProduct = new ProductController($properties['Name'],  $properties['kCal'],  $properties['Protein'],  $properties['Ani_ Protein'], $properties['Vege_ Protein'],  $properties['Fat'],  $properties['Sat_ Fat'],  $properties['Mono_Fat'], $properties['Poly_Fat'], $properties['Omega3'], $properties['Omega6'], $properties['Carbs'], $properties['Netto_Carbs'], $properties['Sugar'], $properties['Fiber'],  $properties['Salt'], $properties['Cholesterol'], $properties['Witamin_K'], $properties['Witamin_A'], $properties['Witamin_B1'], $properties['Witamin_B2'],  $properties['Witamin_B5'], $properties['Witamin_B6'],  $properties['Biotin'],  $properties['Folic_Acid'],  $properties['Witamin_B12'],  $properties['Witamin_C'],  $properties['Witamin_D'],  $properties['Witamin_E'], $properties['Witamin_PP'], $properties['Calcium'], $properties['Chlorine'], $properties['Magnesium'], $properties['Phosphorus'], $properties['Potassium'], $properties['Sodium'], $properties['Iron'], $properties['Zinc'], $properties['Copper'],  $properties['Manganese'], $properties['Molybdenum'], $properties['Iodine'], $properties['Fluorine'], $properties['Chrome'], $properties['Selenium'], $properties['Description'], $properties['userid']);

     if($properties['Old_picture'] === $properties['filename']){

       $updatedProduct->deletePhoto($properties['Old_picture']);
        die();
        
     } 


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



?>