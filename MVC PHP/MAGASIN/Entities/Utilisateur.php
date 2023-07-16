<?php

namespace App\Entities;

class Utilisateur{
     private $id;
     private $sexe;
     private $prenom;
     private $nom;
     private $login;
     private $mdp;
     private $tel;
     private $email;
     private $statut;
     private $adresse;
     private $cp;
     private $ville;


     public function __construct($data = []){

          foreach($data as $key => $value){
               //création de la methode set...
               $methode  = "set" . ucfirst(  $key ) ;
  
               //teste si le setter existe
               if( method_exists($this, $methode) ){
                    //appel du setter et en paramètre la valeur ($value)
                    $this->$methode($value);
               }
          }
  
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
      * Get the value of tel
      */
     public function getTel()
     {
          return $this->tel;
     }

     /**
      * Set the value of tel
      */
     public function setTel($tel): self
     {
          $this->tel = $tel;

          return $this;
     }

     /**
      * Get the value of email
      */
     public function getEmail()
     {
          return $this->email;
     }

     /**
      * Set the value of email
      */
     public function setEmail($email): self
     {
          $this->email = $email;

          return $this;
     }

     /**
      * Get the value of statut
      */
     public function getStatut()
     {
          return $this->statut;
     }

     /**
      * Set the value of statut
      */
     public function setStatut($statut): self
     {
          $this->statut = $statut;

          return $this;
     }

     /**
      * Get the value of adresse
      */
     public function getAdresse()
     {
          return $this->adresse;
     }

     /**
      * Set the value of adresse
      */
     public function setAdresse($adresse): self
     {
          $this->adresse = $adresse;

          return $this;
     }

     /**
      * Get the value of cp
      */
     public function getCp()
     {
          return $this->cp;
     }

     /**
      * Set the value of cp
      */
     public function setCp($cp): self
     {
          $this->cp = $cp;

          return $this;
     }

     /**
      * Get the value of ville
      */
     public function getVille()
     {
          return $this->ville;
     }

     /**
      * Set the value of ville
      */
     public function setVille($ville): self
     {
          $this->ville = $ville;

          return $this;
     }
}