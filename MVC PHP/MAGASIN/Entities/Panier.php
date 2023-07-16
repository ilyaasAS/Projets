<?php

namespace App\Entities;

class Panier{
     private int $id;
     private Utilisateur $client;

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
      * Get the value of client
      */
     public function getClient(): Utilisateur
     {
          return $this->client;
     }

     /**
      * Set the value of client
      */
     public function setClient(Utilisateur $client): self
     {
          $this->client = $client;

          return $this;
     }
}