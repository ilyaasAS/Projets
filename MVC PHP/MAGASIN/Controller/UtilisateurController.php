<?php 

namespace App\Controller;

use App\Entities\Utilisateur;
use App\Model\UserModel;

class UtilisateurController extends AbstractController{

     function user(){
          if( isset($_GET['action']) ){
               $action = $_GET['action'];

               $userModel = new UserModel();

               switch($action){
                    case "inscription":
                         $user = [];
                         if( isset($_POST['login']) ){
                              $user = new Utilisateur($_POST);
                              if( $userModel->inserer($user) ){

                                   header("location: ?action=connexion");
                                   exit;
                              }

                         }
                        
                         $this->render("utilisateur/logon", ["user" => $user]);
                         break;

                    case "connexion" :
                         if( isset($_POST['login']) ){
                              $userModel->connexion($_POST['login'], $_POST['mdp']);
                              if( isset($_SESSION['user']) ){
                                   header("location: .");
                                   exit;
                              }
                         }

                         $this->render("utilisateur/login");
                         break;

                    case "deconnexion":
                         session_destroy();
                         header("location: .");
                         exit;
               }
          }
     }

}