<?php

abstract class ModelGenerique{
     protected $pdo;

     public function __construct()
     {
          $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=rh_tp", "root", "", [
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
          ]);
     }

     public function executerRequete($query, $params = []){
          $stmt = $this->pdo->prepare($query);

          foreach($params as $cle => $valeur){
               $params[$cle] = htmlentities($valeur);
          }

          $stmt->execute($params);

          return $stmt;
     }
}