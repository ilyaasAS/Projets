<?php

class Personnel{
     private $employes = [];

     public function ajouter($emp){
          $this->employes[] = $emp;
     }

     public function afficher(){
          foreach($this->employes as $employe){
               echo $employe->afficher()."<br>";
          }
     }

     public function salaireTotal(){
          $somme = 0;
          
          foreach($this->employes as $employe){
               $somme += $employe->salaire();
          }

          return $somme;
     }
}