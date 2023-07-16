<?php

class Lion extends Carnivore{


     public function seDeplacer(){
          return ' je me déplace seul';
     }

     public function crier(){
          return " je rugis";
     } 

     public function afficher(){
          return parent::afficher() ." " . $this->manger()." " . $this->seDeplacer()." " . $this->crier();
     }
     
}