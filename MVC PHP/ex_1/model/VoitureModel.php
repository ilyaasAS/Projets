<?php

class VoitureModel extends ModelGenerique{

     public function inserer(Voiture $voiture){
          $query = "INSERT INTO voiture VALUES(NULL, :marque, :prix, :client)";

          $stmt = $this->executerRequete($query, [
               "marque"  => $voiture->getMarque(),
               "prix"    => $voiture->getPrix(),
               "client"  => $voiture->getProprio()->getId()
          ]);
     }
     
}