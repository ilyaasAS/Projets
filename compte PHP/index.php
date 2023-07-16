<?php

include "Compte.php";
include "Personne.php";


$tab = [];

for ($i=0; $i < 10; $i++) { 
     $tab[] = new Compte(100+$i, new Personne("", "", 10), 200 + 100*$i);
}

for ($i=0; $i < 10; $i++) { 
     for ($j=1+$i; $j < count($tab) ; $j++) { 
          $tab[$i]->virerVers(20, $tab[$j]);
     }
}

for ($i=0; $i < count($tab); $i++) { 
     echo $tab[$i]->getSolde();
     echo "<br>";
}

