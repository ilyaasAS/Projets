<?php 

namespace App\Model;

use App\Entities\Utilisateur;

class UserModel extends ModelGenerique{

     public function inserer(Utilisateur $user){
          $user->setLogin($this->validate('login', $user->getLogin(), 6, 10)); 
          $user->setMdp($this->validate('mdp', $user->getMdp(), 5, 10));
          $user->setPrenom($this->validate('prenom', $user->getPrenom(), 2, 15));
          $user->setNom($this->validate('nom', $user->getNom(), 2, 15));

          if( UserModel::$isValide ){
               $query = "INSERT INTO utilisateur VALUES(NULL, :sexe, :prenom, :nom, :login, :mdp, :email, :tel, 'client', :adresse, :cp, :ville)";

               $this->executeRequete($query, [
                    "sexe"         => $user->getSexe(),
                    "prenom"       => $user->getPrenom(),
                    "nom"          => $user->getNom(),
                    "login"        => $user->getLogin(),
                    "mdp"          => password_hash($user->getMdp(), PASSWORD_DEFAULT),
                    "email"        => $user->getEmail(),
                    "tel"          => $user->getTel(),
                    "adresse"      => $user->getAdresse(),
                    "cp"           => $user->getCp(),
                    "ville"        => $user->getVille()
               ]);

               return true;
          }else{
               return false;
          }

     }

     public function connexion(string $login, string $mdp){
          $query = "SELECT * FROM utilisateur WHERE login = :login";

          $stmt = $this->executeRequete($query, ["login" => $login]);

          //si le login est bon
          if( $stmt->rowCount() != 0 ){
               $res = $stmt->fetch();

               //si le mdp est bon
               if( password_verify($mdp, $res['mdp']) ){
                    $_SESSION['user'] = serialize(new Utilisateur($res));
               }
          }
     }

}