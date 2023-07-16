<?php

namespace App\Entities;

class Article_panier{
     private Article $article;
     private Panier $panier;
     private int $quantite;

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
      * Get the value of article
      */
     public function getArticle(): Article
     {
          return $this->article;
     }

     /**
      * Set the value of article
      */
     public function setArticle(Article $article): self
     {
          $this->article = $article;

          return $this;
     }

     /**
      * Get the value of panier
      */
     public function getPanier(): Panier
     {
          return $this->panier;
     }

     /**
      * Set the value of panier
      */
     public function setPanier(Panier $panier): self
     {
          $this->panier = $panier;

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
}