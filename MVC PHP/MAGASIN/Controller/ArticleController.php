<?php 

namespace App\Controller;

use App\Entities\Article;
use App\Model\ArticleModel;

class ArticleController extends AbstractController{

     function article(){
          if( isset($_GET['action']) ){
               $action = $_GET['action'];

               $artModel = new ArticleModel();

               switch($action){
                    case "ajouter":

                         if( isset($_POST['libelle']) ){
                              $artModel->inserer(new Article($_POST));

                              header('location: .');
                              exit;
                         }

                         $this->render("article/ajouter");
                         break;

                    case "toShopping":
                         $article = $artModel->getArticle($_GET['id']);
                         
                         //$this->render("article/article", compact([$article]));
                         $this->render("article/article", ["article" => $article]);
                         break;
               }
          }
     }
}