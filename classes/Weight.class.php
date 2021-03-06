<?php

class Weight extends Dbh {

    protected function setWeight($user_id, $weight, $date, $comment){

        $stmt = $this->connect()->prepare('INSERT INTO Weight (user_id, weight, datte, comment) VALUES (?, ?, ?, ?)');

        if(!$stmt->execute(array($user_id, $weight, $date, $comment))){

            $stmt = null;
            header("location: ../weight.php?error=stmtfailed");
            exit();

        }

        $stmt = null;
        header("location: ../weight.php?info=properlyadded");

    }

    protected function getWeight($user_id){

        $stmt = $this->connect()->prepare('SELECT * FROM Weight WHERE user_id = (?)');

        $stmt->execute([$user_id]);

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

    protected function updateWeight($user_id, $id, $weight, $date, $comment){

        $stmt = $this->connect()->prepare("UPDATE Weight SET weight = (?), datte = (?), comment = (?) WHERE user_id = (?) AND id = (?)");

        if($stmt->execute(array($weight, $date, $comment, $user_id, $id))){

            return true;
            $stmt = null;
            exit();

        } else {
            
            return false;
            $stmt = null;
            exit();

        }

    }

}
?>