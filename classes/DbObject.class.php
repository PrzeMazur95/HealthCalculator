<?php

class DbObject extends Dbh {

    protected function DeleteRow($id, $table){

        $stmt = $this->connect()->prepare("DELETE FROM ".$table." WHERE id = (?)");

       $result = $stmt->execute([$id]);

        if(!$result){

            return false;
            $stmt = null;
            exit();

        } else {

            return true;
            $stmt = null;
            exit();

        }


    }  


}
?>