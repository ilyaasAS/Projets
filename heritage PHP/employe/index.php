<?php

include "entities/Employe.php";
include "entities/Responsable.php";
include "entities/Commercial.php";
include "entities/Personnel.php";

$jean = new Employe(10, "Jean", 120);
$marc = new Employe(15, "Marc", 90);

$Joan = new Responsable(17, "Joan", 130, [$jean]);
$Joan->ajouter($marc);

$c1 = new Commercial(20, "vendeur", 100, 2);

$personnel = new Personnel();

$personnel->ajouter($Joan);
$personnel->ajouter($c1);
$personnel->ajouter($jean);
$personnel->ajouter($marc);

echo $personnel->salaireTotal();
$personnel->afficher();   