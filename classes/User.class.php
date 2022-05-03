<?php

class User extends Dbh {

    protected function setUser($username, $pwd, $email){

        $stmt = $this->connect()->prepare('INSERT INTO Users (username, pwd, email) VALUES (?, ?, ?)');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $hashedPwd, $email))){

            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();

        }

        $stmt = null;

    }

    protected function checkUser($username, $email){

        $stmt = $this->connect()->prepare('SELECT username FROM Users WHERE username = ? OR email = ?');

        if(!$stmt->execute(array($username, $email))){

            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();

        }

        $resultCheck;

        if($stmt->rowCount() > 0){

            $resultCheck = false;

        } else {

            $resultCheck = true;

        }

        return $resultCheck;

    }

}

?>