<?php 

spl_autoload_register(function($classe){
     include "entities/".$classe.'.php';
});

$a = new Lion("grise", 120);

var_dump($a);
echo $a->afficher();

$v = new Vache("blanche", 200);

echo "<br>";
echo $v->afficher();