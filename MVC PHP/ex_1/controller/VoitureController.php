<?php

class VoitureController{


     public function voitureAction(){

          if( isset($_GET['action']) ){

               $voitureMdl = new VoitureModel();

               $action = $_GET['action'];

               switch($action){
                    case "new_voiture":
                         //recup users pour le select option
                         $userCtl = new UserController();
                         $users = $userCtl->getUsers();
                         include 'views/voiture/new_voiture.phtml';

                         if( isset($_POST['marque']) ){
                              extract($_POST);

                              $userMdl = new UserModel();

                              $user = $userMdl->getUser($proprio);
                              $voiture = new Voiture(0, $marque, $prix, $user);

                              $voitureMdl->inserer($voiture);

                              header("location: .");
                              exit;
                         }

                         break;
               }
          }
     }
     
}