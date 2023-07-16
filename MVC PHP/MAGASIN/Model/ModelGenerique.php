<?php 

namespace App\Model;

abstract class ModelGenerique{
     protected $pdo;
     protected static $isValide = true;

    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=127.0.0.1;dbname=rh_magasin", "root", "", [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
       ]);
    }

    public function executeRequete($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);

        $stmt->execute($params);

        return $stmt;
    }

    public function getOne($table, $colonne,  $id){
        $query = " SELECT * FROM $table WHERE $colonne = :id";
        $res = $this->executeRequete($query, ["id" => $id]);
        return $res->fetch();


    }

     public function exists($table, $colonne, $id){
        $query = "SELECT * FROM $table WHERE $colonne = :id";

        $stmt = $this->executeRequete($query, ['id' => $id]);

        return $stmt->rowCount() != 0;
     }

     public function validate($champ, $valeur, $min = 2, $max = 30){
          //supprime espace av et ap
          $valeur = trim($valeur);

          if( strlen($valeur) >= $min && strlen($valeur) <= $max ){
               return $valeur;
          }else{
               self::$isValide = false;
               $_SESSION['errors'][$champ] = "saisie incorrecte";
               return $valeur;

          }

     }
}