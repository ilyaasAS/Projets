<?php 

class Employe{
     protected $matricule;
     protected $nom;
     protected $indiceSalarial;
     //variable de classe. Toutes les intances de Employe auront la même copie
     protected static $valeur = 20;

     public function __construct($matricule, $nom, $indiceSalarial){
          $this->matricule = $matricule;
          $this->nom = $nom;
          $this->indiceSalarial = $indiceSalarial;
     }

     public function afficher(){
          return $this->matricule.", ". $this->nom .", ". $this->indiceSalarial.", salaire: " . $this->salaire().' €';
     }

     public function salaire(){
          return $this->indiceSalarial * self::$valeur;
     }
     
     public function getValeur(){
          return self::$valeur;
     }

     public function setValeur($valeur){
          self::$valeur = $valeur;
     }

     /**
      * Get the value of matricule
      */
     public function getMatricule()
     {
          return $this->matricule;
     }

     /**
      * Set the value of matricule
      */
     public function setMatricule($matricule): self
     {
          $this->matricule = $matricule;

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
      * Get the value of indiceSalarial
      */
     public function getIndiceSalarial()
     {
          return $this->indiceSalarial;
     }

     /**
      * Set the value of indiceSalarial
      */
     public function setIndiceSalarial($indiceSalarial): self
     {
          $this->indiceSalarial = $indiceSalarial;

          return $this;
     }
}