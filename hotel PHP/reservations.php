<?php 
include "inc.php";
include 'component/header.php'; 

$stmt = executerRequete("SELECT * FROM reservation");

$tabReservations = [];

while( $res = $stmt->fetch()){
     extract($res);
     
     //Récup une chambre via son ID
     $chambre = getChambre($numChambre);
     
     //Récup une chambre via son ID
     $client = getClient($numClient);

     $reservation = new Reservation($client, $chambre, $dateArrivee, $dateDepart);

     $tabReservations[] = $reservation;
}

?> 

<h2 class="text-center">Liste des réservations</h2>

<table class="table table-striped">
     <tr class="table-dark">
          <th>Chambre</th>
          <th>Prix</th>
          <th>Prénom</th>
          <th>Nom</th>
          <th>Arrvée</th>
          <th>Départ</th>
     </tr>

     <?php foreach($tabReservations as $reservation): ?>
          <tr>
               <td>
                    <img src="img/<?= $reservation->getNumChambre()->getImage(); ?>" alt="">
               </td>
               <td><?= $reservation->getNumChambre()->getPrix(); ?> €</td>
               <td><?= $reservation->getNumClient()->getPrenom(); ?></td>
               <td><?= $reservation->getNumClient()->getNom(); ?></td>
               <td><?= $reservation->getDateArrivee(); ?></td>
               <td><?= $reservation->getDateDepart(); ?></td>
          </tr>
     <?php endforeach; ?>

</table>