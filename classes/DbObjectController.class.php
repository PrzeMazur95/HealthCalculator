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

    public function EditDbRow(){



    }

}
    

?>