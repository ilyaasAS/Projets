<?php

class Compte{
     private int $numero;
     private Personne $titulaire;
     private float $solde;

     public function __construct(int $numero, Personne $titulaire, float $solde){
          $this->numero = $numero;
          $this->titulaire = $titulaire;
          $this->solde = $solde;
     }

     public function deposer($montant){
          $this->solde += $montant;
     }

     public function retirer($montant){
          if( $montant > $this->solde ){
               echo "montant ". $montant . " supérieur à votre solde: " . $this->solde;
          }else{
               $this->solde -= $montant;
          }
          
     }

     public function virerVers($montant, $compteDest){
          $this->retirer($montant);
          $compteDest->deposer($montant);
     }

     public function getNumero(){
          return $this->numero;
     }

     public function getTitulaire() :Personne{
          return $this->titulaire;
     }

     public function getSolde() :float{
          return $this->solde;
     }

     public function setTitulaire($titulaire){
          $this->titulaire = $titulaire;
     }

     public function setSolde(float $montant){
          $this->solde = $montant;
     }

     public function __toString()
     {
          return "numéero: " . $this->numero ." titulaire: " . $this->titulaire->prenom ." solde: ".  $this->solde;
     }
}
