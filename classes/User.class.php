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

    protected function getUser($username, $pwd){

        $stmt = $this->connect()->prepare('SELECT pwd FROM Users WHERE username = ? OR email = ?');

        if(!$stmt->execute(array($username, $pwd))){

            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();

        }

        if($stmt->rowCount() == 0){

            $stmt = null;
            header("location: ../login.php?error=notfound");
            exit();

        }

        $pwdHashed = $stmt->fetchAll();
        $checkPwd = password_verify($pwd, $pwdHashed[0]['pwd']);

        if($checkPwd == false){

            $stmt = null;
            header("location: ../login.php?error=wrongpassword");
            exit();

        } elseif ($checkPwd == true){

            $stmt = $this->connect()->prepare('SELECT * FROM Users WHERE username = ? OR email = ? AND pwd = ?');

            if(!$stmt->execute(array($username, $username, $pwd))){

                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
    
            }

            if($stmt->rowCount() == 0){

                $stmt = null;
                header("location: ../login.php?error=notfound");
                exit();
    
            }

            $user = $stmt->fetchAll();

            session_start();

            $_SESSION['userid']=$user[0]['id'];
            $_SESSION['username']=$user[0]['username'];

            $stmt = null;


        }


        $stmt = null;

    }

}

?>