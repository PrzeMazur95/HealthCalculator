<?php

class DbObjectController extends DbObject {

    public function DeleteDbRow($table, $id, $userid){

        if(empty($id || $table || $userid)){

            header("location: ../weight.php?error=emptyinput");

        } else {

            if($this->DeleteRow($id, $table, $userid)){

                return true;

            } else {

                return false;

            }
            

        }

    }

    public function EditDbRow($table, $id, $user_id){

        $data = array($table, $id, $user_id);

        if($this->CheckIsEmpty($data)){

            $clearData = $this->ClearData($data);
            $result = $this->Find_by_id_and_table($clearData[1], $clearData[0], $clearData[2]);
            if(!$result){

                echo "There is no result";
                die();

            }else{

                return $result;
                die();

            }



        } else {

            echo "There were no informations";
            die();

        }

    }

    public function CheckIsEmpty($data){

        foreach ($data as $date) {

            if(empty($date)){

                return false;

            } else {

                return true;

            }

        }

    }

    public function ClearData($data){

        $clearData = array();

        foreach ($data as $date){

            $clearData[] = trim(htmlspecialchars($date));

        }

        return $clearData;

    }

    public function UpdateOneDbCell($table, $column, $value, $id){



    }
}
    

?>