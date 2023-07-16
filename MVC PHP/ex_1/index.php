<?php

session_start();


include "entities/User.php";
include "entities/Voiture.php";

include 'model/ModelGenerique.php';

include 'model/UserModel.php';
include 'model/VoitureModel.php';

include "controller/UserController.php";
include "controller/VoitureController.php";

$userCtl = new UserController();
$voitureCtl = new VoitureController();

include "views/header.phtml";

$userCtl->userAction();
$voitureCtl->voitureAction();




if(!isset($_GET['action'])){
     $users = $userCtl->getUsers();
     include "views/home.phtml";
}

include "views/footer.phtml";