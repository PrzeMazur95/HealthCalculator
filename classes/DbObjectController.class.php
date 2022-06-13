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

    public function EditDbRow($table, $id){

        $data = array($table, $id);

        if($this->CheckIsEmpty($data)){

            $clearData = $this->ClearData($data);
            print_r($clearData);
            die();


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
}
    

?>