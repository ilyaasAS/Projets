<?php

abstract class Animal{
     protected $couleur;
     protected $poids;

     public function __construct($couleur, $poids){
          $this->setCouleur($couleur);
          $this->setPoids($poids);
     }

     public function boire(){
          return " Je bois de l'eau ";
     }

     public abstract function manger(); 
     public abstract function seDeplacer(); 
     public abstract function crier(); 

     public function afficher(){
          return "je suis ". get_class($this) . " Couleur: " . $this->couleur . " poids: " . $this->poids.'KG';
     }
     

     /**
      * Get the value of couleur
      */
     public function getCouleur()
     {
          return $this->couleur;
     }

     /**
      * Set the value of couleur
      */
     public function setCouleur($couleur): self
     {
          $this->couleur = $couleur;

          return $this;
     }

     /**
      * Get the value of poids
      */
     public function getPoids()
     {
          return $this->poids;
     }

     /**
      * Set the value of poids
      */
     public function setPoids($poids): self
     {
          $this->poids = $poids;

          return $this;
     }
}