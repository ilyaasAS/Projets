<?php 

namespace App\Model;

use App\Entities\Article;

class ArticleModel extends ModelGenerique{

     public function inserer(Article $article){
          $query = "INSERT INTO article VALUES(NULL, :libelle, :prix, :qtt, :desc, :img, :cat)";

          $this->executeRequete($query, [
               "libelle" => $article->getLibelle(),
               "prix"    => $article->getPrix(),
               "qtt"     => $article->getQuantite(),
               "desc"    => $article->getDescription(),
               "img"     => $article->getImage(),
               "cat"     => $article->getCategorie()
          ]);
     }

     public function articles() : array {
          $stmt = $this->executeRequete("SELECT * FROM article");

          $tab = []; 

          while($res = $stmt->fetch()){
               $tab[] = new Article($res);
          }

          return $tab;
     }

     public function getArticle(int $id) : Article {
          $stmt = $this->executeRequete("SELECT * FROM article WHERE id = :id", ['id' => $id]);

          if( $stmt->rowCount() != 0 ){
               return new Article($stmt->fetch());
          }

          return null;
     }
}