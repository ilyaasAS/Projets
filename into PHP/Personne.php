<?php

class Personne{

     //attributs / propiétés / variables d'instance
     public $prenom;
     public $nom;
     public $age;
     public $ville;

     public static $compteur = 0;

     public function __construct($prenom, $nom, $age, $ville = "paris"){
          $this->prenom = $prenom;
          $this->nom = $nom;
          $this->age = $age;
          $this->ville = $ville;

          self::$compteur++;
     }


     public function afficher(){
          echo $this->prenom . ' ' . $this->nom ." " . $this->age . " ans vous habitez " . $this->ville;
     }
     
     public static function nbrePersonne(){
          return self::$compteur;
     }
}