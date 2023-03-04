<?php
class Users {
    private $id, $user_name, $pass_word, $role;

    public function __construct($id, $user_name, $pass_word, $role)
    {
        $this->id = $id;
        $this->user_name = $user_name;
        $this->pass_word = $pass_word;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserName() {
        return $this->user_name;
    }
    
    public function getPassWord() {
        return $this->pass_word;
    }

    public function getRole() {
        return $this->role;
    }
}