<?php

class LigneDeCommande{
     private Article $article;
     private Commande $commande;
     private int $qunatite;

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
      * Get the value of commande
      */
     public function getCommande(): Commande
     {
          return $this->commande;
     }

     /**
      * Set the value of commande
      */
     public function setCommande(Commande $commande): self
     {
          $this->commande = $commande;

          return $this;
     }

     /**
      * Get the value of qunatite
      */
     public function getQunatite(): int
     {
          return $this->qunatite;
     }

     /**
      * Set the value of qunatite
      */
     public function setQunatite(int $qunatite): self
     {
          $this->qunatite = $qunatite;

          return $this;
     }
}