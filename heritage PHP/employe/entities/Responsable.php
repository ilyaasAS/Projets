<?php

class Responsable extends Employe{
     private $subordonnes = [];

     public function __construct($matricule, $nom, $indiceSalarial, $subordonnes){
          parent::__construct($matricule, $nom, $indiceSalarial);

          $this->subordonnes = $subordonnes;
     }

     public function afficher(){
          echo $this->getNom() . ": <br>";
          foreach($this->subordonnes as $emp){
               echo $emp->afficher()."<br>"; 
          }
     }

     public function ajouter($employe){
          $this->subordonnes[] = $employe;
     }

     
     /**
      * Get the value of subordonnes
      */
     public function getSubordonnes()
     {
          return $this->subordonnes;
     }

     /**
      * Set the value of subordonnes
      */
     public function setSubordonnes($subordonnes): self
     {
          $this->subordonnes = $subordonnes;

          return $this;
     }
}