<? 

class ProductController extends Product{

    
    private $name;
    private $kcal;
    private $protein;
    private $animal_protein;
    private $vegetable_protein;
    private $fat;
    private $saturated_fat;
    private $monounsaturated_fat;
    private $polyunsaturated_fat;
    private $omega3_acid;
    private $omega6_acid;
    private $carbohydrates;
    private $net_carbohydrates;
    private $sugar;
    private $fiber;
    private $salt;
    private $cholesterol;
    private $witamin_k;
    private $witamin_a;
    private $witamin_b1;
    private $witamin_b2;
    private $witamin_b5;
    private $witamin_b6;
    private $biotin;
    private $folic_acid;
    private $witamin_b12;
    private $witamin_c;
    private $witamin_d;
    private $witamin_e;
    private $witamin_pp;
    private $calcium;
    private $chlorine;
    private $magnesium;
    private $phosphorus;
    private $potassium;
    private $sodium;
    private $iron;
    private $zinc;
    private $copper;
    private $manganese;
    private $molybdenum;
    private $iodine;
    private $fluorine;
    private $chrome;
    private $selenium;
    private $description;
  


    public function __construct($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol,  $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description){
        
        $this-> name = $name;
        $this-> kcal = $kcal;
        $this-> protein = $protein;
        $this-> animal_protein = $animal_protein;
        $this-> vegetable_protein = $vegetable_protein;
        $this-> fat = $fat;
        $this-> saturated_fat = $saturated_fat;
        $this-> monounsaturated_fat = $monounsaturated_fat;
        $this-> polyunsaturated_fat = $polyunsaturated_fat;
        $this-> omega3_acid = $omega3_acid;
        $this-> omega6_acid = $omega6_acid;
        $this-> carbohydrates = $carbohydrates;
        $this-> net_carbohydrates = $net_carbohydrates;
        $this-> sugar = $sugar;
        $this-> fiber = $fiber;
        $this-> salt = $salt;
        $this-> cholesterol = $cholesterol;
        $this-> witamin_k = $witamin_k;
        $this-> witamin_a = $witamin_a;
        $this-> witamin_b1 = $witamin_b1;
        $this-> witamin_b2 = $witamin_b2;
        $this-> witamin_b5 = $witamin_b5;
        $this-> witamin_b6 = $witamin_b6;
        $this-> biotin = $biotin;
        $this-> folic_acid = $folic_acid;
        $this-> witamin_b12 = $witamin_b12;
        $this-> witamin_c = $witamin_c;
        $this-> witamin_d = $witamin_d;
        $this-> witamin_e = $witamin_e;
        $this-> witamin_pp = $witamin_pp;
        $this-> calcium = $calcium;
        $this-> chlorine = $chlorine;
        $this-> magnesium = $magnesium;
        $this-> phosphorus = $phosphorus;
        $this-> potassium = $potassium;
        $this-> sodium = $sodium;
        $this-> iron = $iron;
        $this-> zinc = $zinc;
        $this-> copper = $copper;
        $this-> manganese = $manganese;
        $this-> molybdenum = $molybdenum;
        $this-> iodine = $iodine;
        $this-> fluorine = $fluorine;
        $this-> chrome = $chrome;
        $this-> selenium = $selenium;
        $this-> description = $description;
  

    }

    public function addProduct(){
        
        if($this->emptyInput()){

            header("location: ../product.php?error=emptyfields");


        }else{

            $this->setProduct($this->name,  $this->kcal,  $this->protein,  $this->animal_protein, $this->vegetable_protein,  $this->fat,  $this->saturated_fat,  $this->monounsaturated_fat, $this->polyunsaturated_fat, $this->omega3_acid, $this->omega6_acid, $this->carbohydrates, $this->net_carbohydrates, $this->sugar,  $this->fiber,  $this->salt, $this->cholesterol,  $this->witamin_k, $this->witamin_a, $this->witamin_b1,  $this->witamin_b2, $this->witamin_b5, $this->witamin_b6,  $this->biotin,  $this->folic_acid,  $this->witamin_b12,  $this->witamin_c,  $this->witamin_d,  $this->witamin_e, $this->witamin_pp, $this->calcium, $this->chlorine, $this->magnesium, $this->phosphorus, $this->potassium, $this->sodium, $this->iron, $this->zinc, $this->copper,  $this->manganese, $this->molybdenum, $this->iodine, $this->fluorine, $this->chrome, $this->selenium, $this->description);
        

        }

    }

    private function emptyInput(){


        if(empty($this->name) || empty($this->kcal) || empty($this->protein) || empty($this->fat) || empty($this->carbohydrates) || empty($this->sugar) || empty($this->fiber) || empty($this->salt) || empty($this->cholesterol)){
            
            return true;

        }else{

            return false;
        }


    }
    
}


?>