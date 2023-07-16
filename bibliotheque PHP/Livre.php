<?php 
class Livre{
     private $titre;
     private $auteur;
     private $editeur;

     public function __construct($titre, $auteur, $editeur)
     {
          $this->titre = $titre;
          $this->auteur = $auteur;
          $this->editeur = $editeur;
     }

     public function getTitre(){
          return $this->titre;
     }

     public function getAuteur(){
          return $this->auteur;
     }

     public function getEditeur(){
          return $this->editeur;
     }

     public function setTitre($titre){
          $this->titre = $titre;
     }

     public function setAuteur($auteur){
          $this->auteur = $auteur;
     }

     public function setEditeur($editeur){
          $this->editeur = $editeur;
     }

     public function __toString()
     {
          return "Titre: " . $this->titre . 
                 " Auteur: " . $this->auteur . 
                 " Editeur: " . $this->editeur;
     }
}