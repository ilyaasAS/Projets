<?php

class VoitureModel{

     private $pdo;

     public function __construct(){
          $this->pdo = new PDO(
               "mysql:host=localhost;dbname=rh_tp","root", "",
               [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
               ]
          );

     }

     public function addVoiture(){
          extract($_POST);

          //pour récuperer un user
          $userModel = new UserModel;
          $user = $userModel->getUser($proprio);

          $voiture = new Voiture(0, $marque, $prix, $user );

          $query = "INSERT INTO voiture VALUES(NULL, :marque, :prix, :proprio)";
          $stmt = $this->pdo->prepare($query);

          $stmt->execute([
               "marque"    => $voiture->getMarque(),
               "prix"  => $voiture->getPrix(),
               "proprio"     => $voiture->getProprio()->getId()
          ]);

     }

     public function getVoitures(){
          $stmt = $this->pdo->prepare("SELECT * FROM voiture");
          $stmt->execute();

          $tab = [];

          while($res = $stmt->fetch()){
               extract($res);

                //pour récuperer un user
               $userModel = new UserModel;
               $user = $userModel->getUser($proprio);

               $tab[] = new Voiture($id, $marque, $prix, $user );
          }

          return $tab;
     }

}