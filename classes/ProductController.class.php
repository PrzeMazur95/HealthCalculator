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
    private $userid;


    public $tmp_path;
    public $type;
    public $filename;
    public static $uploads_directory = "/uploads/images";
    public $errors = array();
    public $upload_errors_array = array (

        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE",
        UPLOAD_ERR_PARTIAL=> "The uploaded file was onlu partlly uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload."
    
    
    );
  


    public function __construct($name,  $kcal,  $protein,  $animal_protein, $vegetable_protein,  $fat,  $saturated_fat,  $monounsaturated_fat, $polyunsaturated_fat, $omega3_acid, $omega6_acid, $carbohydrates, $net_carbohydrates, $sugar,  $fiber,  $salt, $cholesterol,  $witamin_k, $witamin_a, $witamin_b1,  $witamin_b2,  $witamin_b5, $witamin_b6,  $biotin,  $folic_acid,  $witamin_b12,  $witamin_c,  $witamin_d,  $witamin_e, $witamin_pp, $calcium, $chlorine, $magnesium, $phosphorus, $potassium, $sodium, $iron, $zinc, $copper,  $manganese, $molybdenum, $iodine, $fluorine, $chrome, $selenium, $description, $userid){
        
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
        $this->userid = $userid;
  

    }

    public function addProduct(){
        
        if($this->emptyInput()){

            header("location: ../add_product.php?error=emptyfields");


        }else{

          $this->setProduct($this->name,  $this->kcal,  $this->protein,  $this->animal_protein, $this->vegetable_protein,  $this->fat,  $this->saturated_fat,  $this->monounsaturated_fat, $this->polyunsaturated_fat, $this->omega3_acid, $this->omega6_acid, $this->carbohydrates, $this->net_carbohydrates, $this->sugar,  $this->fiber,  $this->salt, $this->cholesterol,  $this->witamin_k, $this->witamin_a, $this->witamin_b1,  $this->witamin_b2, $this->witamin_b5, $this->witamin_b6,  $this->biotin,  $this->folic_acid,  $this->witamin_b12,  $this->witamin_c,  $this->witamin_d,  $this->witamin_e, $this->witamin_pp, $this->calcium, $this->chlorine, $this->magnesium, $this->phosphorus, $this->potassium, $this->sodium, $this->iron, $this->zinc, $this->copper,  $this->manganese, $this->molybdenum, $this->iodine, $this->fluorine, $this->chrome, $this->selenium, $this->description, $this->userid);
        
        }

    }

    public function addProductAndPhoto(){
        
        if($this->emptyInput()){

            header("location: ../add_product.php?error=emptyfields");


        }else{

            if($this->setProductAndPhoto($this->name,  $this->kcal,  $this->protein,  $this->animal_protein, $this->vegetable_protein,  $this->fat,  $this->saturated_fat,  $this->monounsaturated_fat, $this->polyunsaturated_fat, $this->omega3_acid, $this->omega6_acid, $this->carbohydrates, $this->net_carbohydrates, $this->sugar,  $this->fiber,  $this->salt, $this->cholesterol,  $this->witamin_k, $this->witamin_a, $this->witamin_b1,  $this->witamin_b2, $this->witamin_b5, $this->witamin_b6,  $this->biotin,  $this->folic_acid,  $this->witamin_b12,  $this->witamin_c,  $this->witamin_d,  $this->witamin_e, $this->witamin_pp, $this->calcium, $this->chlorine, $this->magnesium, $this->phosphorus, $this->potassium, $this->sodium, $this->iron, $this->zinc, $this->copper,  $this->manganese, $this->molybdenum, $this->iodine, $this->fluorine, $this->chrome, $this->selenium, $this->description, $this->filename, $this->userid)){

                return true;

            } else {

                return false;

            }
             
        }

    }

    private function emptyInput(){


        if(empty($this->name) || empty($this->kcal) || empty($this->protein) || empty($this->fat) || empty($this->carbohydrates) || empty($this->sugar)){
            
            return true;

        }else{

            return false;
        }


    }

    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)) {

            $this->errors[] = "There was no file uploaded here";
            // print_r($this->errors);
            // die();
            return false;

        } elseif($file['error'] !=0) {

            $this->errors[] = $this->upload_errors_array[$file['error']];
            // print_r($this->errors);
            // die();
            return false;

        }else{

            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];

            return true;

        }

    }


    public function save() {

        if(!empty($this->errors)){

            return false;

        }

        if(empty($this->filename) || empty($this->tmp_path)){

            $this->errors[] = "The file was not available";
            return false;

        }

        $target_path = SITE_ROOT . DS . ProductController::$uploads_directory . DS . $this->filename;

        if(file_exists($target_path)){

            $this->errors[] = "The file {$this->filename} already exists";
            return false; 

        }
        
        if($this->addProductAndPhoto() && move_uploaded_file($this->tmp_path, $target_path) ) {

            unset($this->tmp_path);
            return true;

        } else {

            $this->errors[] = "The file directory probably doesn't have permission, or something went wrong with Db query, contact with Admin";
            return false;

        }


    }

    public static function deletePhoto($filename){

        $target_path = SITE_ROOT . DS . ProductController::$uploads_directory . DS . $filename;

        if(unlink($target_path)){

            return true;

        } else {

            return false;

        }
        

    }

    public function updateProduct(){


        
    }
    
}


?>