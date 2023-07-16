<?php

namespace App\Entities;

class Article{
     private int $id;
     private string $libelle;
     private float $prix;
     private int $quantite;
     private string $description;
     private string $image;
     private string $Categorie;


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
     public function getId(): int
     {
          return $this->id;
     }

     /**
      * Set the value of id
      */
     public function setId(int $id): self
     {
          $this->id = $id;

          return $this;
     }

     /**
      * Get the value of libelle
      */
     public function getLibelle(): string
     {
          return $this->libelle;
     }

     /**
      * Set the value of libelle
      */
     public function setLibelle(string $libelle): self
     {
          $this->libelle = $libelle;

          return $this;
     }

     /**
      * Get the value of prix
      */
     public function getPrix(): float
     {
          return $this->prix;
     }

     /**
      * Set the value of prix
      */
     public function setPrix(float $prix): self
     {
          $this->prix = $prix;

          return $this;
     }

     /**
      * Get the value of quantite
      */
     public function getQuantite(): int
     {
          return $this->quantite;
     }

     /**
      * Set the value of quantite
      */
     public function setQuantite(int $quantite): self
     {
          $this->quantite = $quantite;

          return $this;
     }

     /**
      * Get the value of description
      */
     public function getDescription(): string
     {
          return $this->description;
     }

     /**
      * Set the value of description
      */
     public function setDescription(string $description): self
     {
          $this->description = $description;

          return $this;
     }

     /**
      * Get the value of image
      */
     public function getImage(): string
     {
          return $this->image;
     }

     /**
      * Set the value of image
      */
     public function setImage(string $image): self
     {
          $this->image = $image;

          return $this;
     }

     /**
      * Get the value of Categorie
      */
     public function getCategorie(): string
     {
          return $this->Categorie;
     }

     /**
      * Set the value of Categorie
      */
     public function setCategorie(string $Categorie): self
     {
          $this->Categorie = $Categorie;

          return $this;
     }
}