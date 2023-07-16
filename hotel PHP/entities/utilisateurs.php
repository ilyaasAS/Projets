<?php

class Utilisateurs
{
    private $id_user;
    private $login;
    private $password;
    private $role;
    

    public function __construct($id_user, $login, $password, $role)
    {
        $this->setIdUser($id_user);
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setRole($role);
    }


    public function getIdUser()
    {
        return $this->id_user;
    }


    public function setIdUser($id_user) : self
    {
        $this->id_user = $id_user;

        return $this;
    }


    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login) : self
    {
        $this->login = $login;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password) : self
    {
        $this->password = $password;

        return $this;
    }


    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role) : self
    {
        $this->role = $role;

        return $this;
    }
}