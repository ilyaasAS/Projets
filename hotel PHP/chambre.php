<?php 
include "inc.php";
include 'component/header.php'; 


if( isset($_GET['idChambre']) && ctype_digit($_GET['idChambre'])): ?> 

     <?php
          $stmt = executerRequete("SELECT * FROM chambre WHERE numChambre = :id", ['id' => $_GET['idChambre']]);

          extract($stmt->fetch());

          $chambre = new Chambre($numChambre, $prix, $nbLits, $nbPers, $image, $description);
     
     ?>

     <h2 class="bg-dark text-center text-white">Détail chambre</h2>

     <img class="img-fluid" src="img/<?= $chambre->getImage() ?>" alt="Card image cap">
     <div> Prix : <?= $chambre->getPrix() ?> </div>
     <div> Lits : <?= $chambre->getNbLits() ?> </div>
     <div> Personnes : <?= $chambre->getNbPers() ?> </div>
     <div> 
          <?= htmlentities($chambre->getDescription()) ?>
     </div>

     <a href="reserver.php?id_chambre=<?= $chambre->getNumChambre() ?>" class="btn btn-success">Réserver</a>

<?php 
endif;
include 'component/footer.php'; 

