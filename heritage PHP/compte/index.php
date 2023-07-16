<?php

include 'Compte.php';
include 'CompteAvecDec.php';

$c1 = new Compte(1001, "Toto", 1500);

$c2 = new CompteAvecDec(1002, "TATA", 2000, 500);

try{
     $c1->retirer(1600);
}catch(Exception $e){
     echo $e->getMessage();
}



var_dump($c2);

var_dump($c1);
