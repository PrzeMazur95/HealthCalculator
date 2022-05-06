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


    protected function Find_by_id_and_table($table, $id, $userid){

        $stmt = $this->connect()->prepare("SELECT * FROM ".$table." WHERE id = (?) AND user_id = (?) LIMIT 1");

        $stmt->execute([$id, $userid]);

        $results = $stmt->fetchAll();

        if(!$results){

            return false;
            $stmt = null;
            exit();

        } else {

            return $results;
            $stmt = null;
            exit();

        }

        return $results;

    }  
        

}
?>