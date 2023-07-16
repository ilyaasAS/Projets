<?php

class UserModel extends ModelGenerique{

     public function inserer(User $user){
          $query = "INSERT INTO user VALUES(NULL, :sexe, :prenom, :nom, :login, :mdp, :role)";

          $this->executerRequete($query, [
               "sexe"    => $user->getSexe(),
               "prenom"  => $user->getPrenom(),
               "nom"     => $user->getNom(),
               "login"   => $user->getLogin(),
               "mdp"     => password_hash($user->getMdp(), PASSWORD_DEFAULT),
               "role"    => $user->getRole()
          ]);
          
     }

     public function connexion($login, $password){
          $stmt = $this->executerRequete("SELECT * FROM user WHERE login = :login", ["login" => $login]);

          if( $stmt->rowCount() != 0 ){
               //recup juste avec le login
               $res = $stmt->fetch();

               //verification du mdp
               if( password_verify($password, $res['mdp']) ){
                    extract($res);

                    return new User($id, $sexe, $prenom, $nom, $login, $mdp, $role);
               }
               
          } 

          return null;
     }     
     
     public function getUser($id){
          $stmt = $this->executerRequete("SELECT * FROM user WHERE id = :id", ["id" => $id]);

          $res = $stmt->fetch();
          extract($res);

          return new User($id, $sexe, $prenom, $nom, $login, $mdp, $role);
                   
     }

     public function getUsers(){
          $stmt = $this->executerRequete("SELECT * FROM user");

          $tab = [];

          while( $res = $stmt->fetch() ){
               extract($res);

               $tab[] = new User($id, $sexe, $prenom, $nom, $login, $mdp, $role);
          }

          return $tab;
     }
     
}