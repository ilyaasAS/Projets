<?php

class UserModel{

     private $pdo;

     public function __construct(){
          $this->pdo = new PDO(
               "mysql:host=localhost;dbname=rh_tp","root", "",
               [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
               ]
          );

     }

     public function inscription(){
          extract($_POST);
          $user = new User(0, $sexe, $prenom, $nom, $login, $mdp, 'client');

          $query = "INSERT INTO user VALUES(NULL, :sexe, :prenom, :nom, :login, :mdp, 'client' )";
          $stmt = $this->pdo->prepare($query);

          $stmt->execute([
               "sexe"    => $user->getSexe(),
               "prenom"  => $user->getPrenom(),
               "nom"     => $user->getNom(),
               "mdp"     => $user->getMdp(),
               "login"   => $user->getLogin()
          ]);

     }

     public function connexion(){
          $query = "SELECT * FROM user WHERE login = ? AND mdp = ?";
          $stmt = $this->pdo->prepare($query);

          $stmt->execute([
               $_POST['login'],
               $_POST['mdp']
          ]);

          if($stmt->rowCount() != 0){
               $res = $stmt->fetch();

               extract($res);
               $user = new User($id, $sexe, $prenom, $nom, $login, $mdp, $role);

               $_SESSION['user'] = serialize($user);

          }
          
     }

     public function isConnected(){
          if( isset($_SESSION['user']) ){
               return true;
          }

          return false;
     }

     public function isAdmin(){
          if( $this->isConnected() && unserialize($_SESSION['user'])->getRole() == "admin" ){
               return true;
          }

          return false;
     }

     public function getUser($id){
          $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
          $stmt->execute([$id]);

          extract($stmt->fetch());

          return new User($id, $sexe, $prenom, $nom, $login, $mdp, $role);
     }

     
     public function getUsers(){
          $stmt = $this->pdo->prepare("SELECT * FROM user");
          $stmt->execute();

          $tab = [];

          while($res = $stmt->fetch()){
               extract($res);

               $tab[] = new User($id, $sexe, $prenom, $nom, $login, $mdp, $role);
          }

          return $tab;
     }

}