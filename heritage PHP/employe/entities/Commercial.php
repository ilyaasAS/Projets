<?php 

class Commercial extends Employe{
     private $vente;

     public function __construct($matricule, $nom, $indiceSalarial, $vente){
          parent::__construct($matricule, $nom, $indiceSalarial);

          $this->vente = $vente;
     }

     public function salaire(){
          return parent::salaire() + $this->vente*5;
     }

     /**
      * Get the value of vente
      */
     public function getVente()
     {
          return $this->vente;
     }

     /**
      * Set the value of vente
      */
     public function setVente($vente): self
     {
          $this->vente = $vente;

          return $this;
     }
}