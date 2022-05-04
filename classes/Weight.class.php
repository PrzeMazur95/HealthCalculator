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

}
?>