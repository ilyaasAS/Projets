<?php

namespace App\Controller;

use Exception;

abstract class AbstractController{

     /**
      * prend prend en paramètre un chaine de carectère pour le nom de la <strong style='color: red'>vue</strong>.Un second paramètre optionnel pour les données à afficher.
      */
     public function render(string $view, array $data = null){
          
          ob_start();
          
          $page = "Views/" . $view. '.phtml';

          //teste de sécurité
          $page = str_replace("../", "protect", $page);
          $page = str_replace(";", "protect", $page);
          $page = str_replace("%", "protect", $page);

          if( !file_exists($page) ){
               throw new Exception("Cette page n'existe pas. En tout cas pas dans ce site");
          }
          
          !empty($data) ? extract($data) : '';

          include $page;

          $content = ob_get_clean();

          include 'Views/template.phtml';

     }
}