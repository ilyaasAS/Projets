<?php

class Voiture{
     private int $id;
     private string $marque;
     private float $prix;
     private User $proprio;

     public function __construct(int $id, string $marque, float $prix, User $proprio)
     {
          $this->setId($id);
          $this->setMarque($marque);
          $this->setPrix($prix);
          $this->setProprio($proprio);
          
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
      * Get the value of marque
      */
     public function getMarque(): string
     {
          return $this->marque;
     }

     /**
      * Set the value of marque
      */
     public function setMarque(string $marque): self
     {
          $this->marque = $marque;

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
      * Get the value of proprio
      */
     public function getProprio(): User
     {
          return $this->proprio;
     }

     /**
      * Set the value of proprio
      */
     public function setProprio(User $proprio): self
     {
          $this->proprio = $proprio;

          return $this;
     }
}