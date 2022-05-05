<?php

class DbObjectController extends DbObject {

    public function DeleteDbRow($table, $id){

        if(empty($id || $table)){

            header("location: ../weight.php?error=emptyinput");

        } else {

            if($this->DeleteRow($id, $table)){

                return true;

            } else {

                return false;

            }
            

        }

    }

}
    

?>