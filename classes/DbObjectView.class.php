<?php

class DbObjectView extends DbObject {

    public function Find_by_id($table, $id, $userid){

        if(!is_numeric($id) || is_string($table || !is_numeric($userid))){

            header("location: index.php");

        } else {

            if($object = $this->Find_by_id_and_table($table, $id, $userid)){

                return $object;

            } else { 

                header("location: products.php?error=id");
                exit();

            }
            
            

        }

    }

    public function Find_by_name($table, $search){

        if($object = $this->Find_by_name_ajax($table, $search)){

            return $object;

        } else { 

            return false;
            exit();

        }
            
    }

}
    

?>