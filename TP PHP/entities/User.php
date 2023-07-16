<?php

class User{
     private $id;
     private $sexe;
     private $prenom;
     private $nom;
     private $login;
     private $mdp;
     private $role;

     public function __construct($id, $sexe, $prenom, $nom, $login, $mdp, $role)
     {
          $this->setId($id);
          $this->setSexe($sexe);
          $this->setPrenom($prenom);
          $this->setNom($nom);
          $this->setLogin($login);
          $this->setMdp($mdp);
          $this->setRole($role);
     }

     /**
      * Get the value of id
      */
     public function getId()
     {
          return $this->id;
     }

     /**
      * Set the value of id
      */
     public function setId($id): self
     {
          $this->id = $id;

          return $this;
     }

     /**
      * Get the value of sexe
      */
     public function getSexe()
     {
          return $this->sexe;
     }

     /**
      * Set the value of sexe
      */
     public function setSexe($sexe): self
     {
          $this->sexe = $sexe;

          return $this;
     }

     /**
      * Get the value of prenom
      */
     public function getPrenom()
     {
          return $this->prenom;
     }

     /**
      * Set the value of prenom
      */
     public function setPrenom($prenom): self
     {
          $this->prenom = $prenom;

          return $this;
     }

     /**
      * Get the value of nom
      */
     public function getNom()
     {
          return $this->nom;
     }

     /**
      * Set the value of nom
      */
     public function setNom($nom): self
     {
          $this->nom = $nom;

          return $this;
     }

     /**
      * Get the value of login
      */
     public function getLogin()
     {
          return $this->login;
     }

     /**
      * Set the value of login
      */
     public function setLogin($login): self
     {
          $this->login = $login;

          return $this;
     }

     /**
      * Get the value of mdp
      */
     public function getMdp()
     {
          return $this->mdp;
     }

     /**
      * Set the value of mdp
      */
     public function setMdp($mdp): self
     {
          $this->mdp = $mdp;

          return $this;
     }

     /**
      * Get the value of role
      */
     public function getRole()
     {
          return $this->role;
     }

     /**
      * Set the value of role
      */
     public function setRole($role): self
     {
          $this->role = $role;

          return $this;
     }
}