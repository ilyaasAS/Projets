<?php

class CommandeController extends ControllerAbstract{
    
     public function commandeAction(){

          // if( !$this->isAdmin() ){
          //      header("location: ?action=connexion");
          //      exit();
          // }
          
          $vehMdl = new VehiculeModel();
          $agenceMdl = new AgenceModel();
          $membreMdl = new MembreModel();
          $cmdMdl = new CommandeModel();

          if( isset($_GET['actionCmd']) ){

               if( !$_SESSION['user'] ){
                    header("location: ?action=connexion");
                    exit;
               }
               $action = $_GET['actionCmd'];

               switch($action){
                    case "reserver":

                         if( isset($_POST['date_heure_depart']) ){
                              $cmd = new Commande($_POST);
                              $cmdMdl->inserer($cmd);
                              
                              header("location: .");
                              exit;
                         }


                         $vehiculeCmd = $vehMdl->getVehicule($_GET['vehicule']);
               
                         include "views/reserver.phtml";
                         break;

                    case "gestionCmd":
                         if( !$this->isAdmin() ){
                             header("location: .");
                             exit; 
                         }
                         $commandes = $cmdMdl->commandes();

                         include "views/backOffice/commandes.phtml";
                         break;

                    case "gestionCmdPerso":
                         if( !$this->isConnected() ){
                              header("location: .");
                              exit; 
                          }
                          $commandes = $cmdMdl->commandesByClient(unserialize($_SESSION['user'])->getId_membre());
                          include "views/backOffice/commandes.phtml";
                         break;
               }
          }
     }
}