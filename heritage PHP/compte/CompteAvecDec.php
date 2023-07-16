<?php 

class CompteAvecDec extends Compte{
     private $decouvert;

     public function __construct($numero, $titulaire, $solde, $decouvert){
          //appel du constructeur parent(Compte)
          parent::__construct($numero, $titulaire, $solde);

          $this->decouvert = $decouvert;
     }

     public function retirer($montant){
          if( $this->solde + $this->decouvert >= $montant ){
               $this->solde -= $montant;
          }
          
     }

     public function getDecouvert(){
          return $this->decouvert;
     }

     public function setDecouvert($decouvert){
          $this->decouvert = $decouvert;
     }

     public function __toString(){
          return parent::__toString() . " Découvert: " . $this->decouvert;
     }
}