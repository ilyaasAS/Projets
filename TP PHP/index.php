<?php
session_start();

include "entities/User.php";
include "entities/Voiture.php";

include "model/UserModel.php";
include "model/VoitureModel.php";

$userModel = new UserModel;
$voitureModel = new VoitureModel;

include "views/header.phtml";

if( isset($_GET['action']) ){
     $action = $_GET['action'];

     switch($action){
          case "inscription":
               include "views/inscription.phtml";
               if( isset($_POST['login']) ){ 
                    $userModel->inscription();  
                    header("location: .");
                    exit;
               }
               break;
          case "connexion":
               include "views/connexion.phtml";
               if( isset($_POST['login']) ){
                    $userModel->connexion();
                    header("location: .");
                    exit;
               }
               break;
          case "new_voiture":
               $users = $userModel->getUsers();
               include "views/new_voiture.phtml";
               if( isset($_POST['marque']) ){
                    $voitureModel->addVoiture();
                    header("location: .");
                    exit;
               }
               break;
          case "deconnexion":
               session_destroy();
               header("location: .");
               exit;
               break;
     }

}else{
     $users = $userModel->getUsers();
     $voitures = $voitureModel->getVoitures();
     include "views/home.phtml";
}
