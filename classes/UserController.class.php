<?php

class UserController extends User {

    private $username;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($username, $pwd, $pwdRepeat, $email){

        $this->username = $username;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;


    }


    public function signupUser(){

        if($this->emptyInput() == false){

            header("location: ../register.php?error=emptyinput");
            exit();

        }

        if($this->pwdMatch() == false){

            header("location: ../register.php?error=pwdnotMatch");
            exit();

        }

        if($this->invalidUsername() == false){

            header("location: ../register.php?error=invalidUsername");
            exit();

        }

        if($this->invalidEmail() == false){

            header("location: ../register.php?error=invalidEmail");
            exit();

        }


        if($this->usernameTaken() == false){

            header("location: ../register.php?error=usernameTaken");
            exit();

        }

        $this->setUser($this->username, $this->pwd, $this->email);

    }

    private function emptyInput(){

        $result;

        if(empty($this->username || $this->pwd || $this->pwdRepeat || $this->email)){

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }

    private function invalidUsername(){

        $result;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }

    private function invalidEmail(){

        $result;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }



    private function usernameTaken(){

        $result;

        if(!$this->checkUser($this->username, $this->email)){

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }

    private function pwdMatch(){

        $result;

        if($this->pwd !== $this->pwdRepeat){

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }   

    public function loginUser(){

        if(empty($this->username) || empty($this->pwd)){

            header("location: ../login.php?error=emptyFields");
            exit();

        } else {

            $this->getUser($this->username, $this->pwd);

        }

    }

}