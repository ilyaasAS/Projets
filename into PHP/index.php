<?php

require_once 'Personne.php';

 $p1 = new Personne("toto", "tata", 20);

 $p2 = new Personne("titi", "tata", 25, "Marseilles");

 $p1->afficher();
 echo "<br>";
 $p2->afficher();

 echo "<br>";
 echo Personne::nbrePersonne();