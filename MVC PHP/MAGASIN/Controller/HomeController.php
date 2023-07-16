<?php

namespace App\Controller;

use App\Model\ArticleModel;

class HomeController extends AbstractController{

     public function index(){
          if( !isset($_GET['action']) ){

               $artMdl = new ArticleModel();

               $arts = $artMdl->articles();
          
               $this->render("home", ["articles" => $arts]);

          }
     }

}