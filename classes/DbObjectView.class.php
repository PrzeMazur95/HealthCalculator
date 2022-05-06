<?php

class DbObjectView extends DbObject {

    public function Find_by_id($table, $id, $userid){

        if(!is_numeric($id) || is_string($table || !is_numeric($userid))){

            header("location: ../index.php");

        } else {

            $object = $this->Find_by_id_and_table($table, $id, $userid);
            return $object;

        }

    }

}
    

?>