<?php

session_start();

include "vendor/autoload.php";

use App\Controller\ArticleController;
use App\Controller\HomeController;
use App\Controller\UtilisateurController;

$home = new HomeController;
$utilisateur = new UtilisateurController;
$article = new ArticleController;




$home->index();
$utilisateur->user();
$article->article();