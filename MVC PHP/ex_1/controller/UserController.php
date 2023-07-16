<?php

class UserController{

     public function userAction(){

          $userMdl = new UserModel();

          if( isset($_GET['action'])){

               $action = $_GET['action'];

               if( $action == "connexion" ){
                    include "views/user/connexion.phtml";

                    //teste si formulaire est envoyé
                    if( isset($_POST['login']) ){
                         $user = $userMdl->connexion($_POST['login'], $_POST['mdp']);

                        if( !is_null($user) ){
                              $_SESSION['user'] = serialize($user);

                              header("location: .");
                              exit;

                        }
                    }

               }else if( $action == "inscription" ){
                    include "views/user/inscription.phtml";
                    
                    //si formulaire submit
                    if( isset($_POST['prenom']) ){
                         extract($_POST);
                         $user = new User(0, $sexe, $prenom, $nom, $login, $mdp, 'client');
                         
                         //appel du model pour inserer
                         $userMdl->inserer($user);

                         header("location: ?action=connexion");
                         exit;
                    }
               
               }else if( $action == "new_user" ){
                    var_dump("new_user");

               }else if( $action == "deconnexion" ){
                    session_destroy();

                    header("location: .");
                    exit;
               }
          }
     }

     public function getUsers(){
          $userMdl = new UserModel();

          return $userMdl->getUsers();
     }
     
}