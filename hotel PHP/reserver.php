<?php 
include "inc.php";
include 'component/header.php'; 


if( isset($_POST['prenom']) ){
     extract($_POST);

     $query = "INSERT INTO client VALUES(NULL, :prenom, :nom, :tel)";

     $stmt = executerRequete($query, [
          "prenom" => $prenom,
          "nom"    => $nom,
          "tel"    => $tel
     ]);
     
     //permet de récuperer le dernier id 
     $numClient = $pdo->lastInsertId();

     $query = "INSERT INTO reservation VALUES(:client, :chambre, :arrivee, :depart)";

     $stmt = executerRequete($query, [
          "client" => $numClient,
          "chambre"    => $numChambre,
          "arrivee"    => $arrivee,
          "depart"    => $depart
     ]);

     //redirection vers l'index. ça permet d'éviter la double soumission du formulaire
     header("location: .");
     exit;
}

?> 

<h2 class="bg-dark text-center text-white">Réserver</h2>

<form action="" method="post">
     <input type="hidden" name="numChambre" value="<?= $_GET['id_chambre'] ?>">
     <div class="form-group">
          <label for="">Prénom</label>
          <input type="text" name="prenom" class="form-control">
     </div>
     <div class="form-group">
          <label for="">Nom</label>
          <input type="text" name="nom" class="form-control">
     </div>
     <div class="form-group">
          <label for="">Téléphone</label>
          <input type="text" name="tel" class="form-control">
     </div>
     
     <div class="form-group">
          <label for="">Date arrivée</label>
          <input type="date" name="arrivee" class="form-control">
     </div>
     <div class="form-group">
          <label for="">Date départ</label>
          <input type="date" name="depart" class="form-control">
     </div>

     <input type="submit" class="btn btn-success mt-3">
</form>

<?php include 'component/footer.php'; ?>
