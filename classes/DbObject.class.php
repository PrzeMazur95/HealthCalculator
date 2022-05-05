<?php

class DbObject extends Dbh {

    protected function DeleteRow($id, $table, $userid){

        $stmt = $this->connect()->prepare("DELETE FROM ".$table." WHERE id = (?) AND user_id = (?)");

       $result = $stmt->execute([$id, $userid]);

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