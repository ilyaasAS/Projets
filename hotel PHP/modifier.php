<?php 
include "inc.php";
include 'component/header.php'; 

//modifier une chambre
if( isset($_POST["prix"]) && isset($_POST['numChambre'])){

     extract($_POST);
     $nom_fichier = $nomImage;

     //teste si un fichier a été uploader pour remplacer l'ancien
     if( !empty($_FILES['image']['name']) ){
             
          //teste sur la taille
          if( $_FILES['image']['size'] <= 1000000){

               //tableau des extensions de fichiers autorisés
               $extensions = ['jpg', 'jpeg', 'png'];

               //info fichier uploadé
               $info = pathinfo($_FILES['image']['name']);

               //teste si l'extension du fichier est dans la collection des extansions autorisées
               if( in_array($info['extension'], $extensions) ){

                    //nom du fichier
                    $nom_fichier = $info['basename'];

                    //déplacer le fichier dans le répertoire img
                    move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $nom_fichier);  

                    //teste si un fichier existe
                    if( file_exists("img/".$nomImage) ){
                         //supprimer un fichier
                         unlink("img/".$nomImage);
                    }
               }               
          }

     }
     $c = new Chambre($numChambre, $prix, $nblits, $nbpers, $nom_fichier, $description);

     $query = "UPDATE chambre 
               SET prix = :prix, nbLits = :lit, nbPers = :pers, image = :img, description = :desc WHERE numChambre = :id";

     $stmt = executerRequete($query, [
          "prix"    => $c->getPrix(),
          "lit"     => $c->getNbLits(),
          "pers"    => $c->getNbPers(),
          "img"     => $c->getImage(),
          "desc"    => $c->getDescription(),
          "id"      => $c->getNumChambre()
     ]);

     //redirection vers l'index. ça permet d'éviter la double soumission du formulaire
     header("location: chambre.php?idChambre=" . $numChambre);
     exit;
}

if( isset($_GET['idChambre']) ){

     $stmt = executerRequete("SELECT * FROM chambre WHERE numChambre = :id", ['id' => $_GET['idChambre']]);

     extract($stmt->fetch());

     $chambre = new Chambre($numChambre, $prix, $nbLits, $nbPers, $image, $description);
}

?> 
<h2 class="text-center">Modifier chambre</h2>
<form action="" method="post" enctype="multipart/form-data">
     <input type="hidden" name="numChambre" value="<?= $chambre->getNumChambre() ?>" >
     <div class="row">
          <div class="form-group col-6">
               <label for="">Prix</label>
               <input type="number" name="prix" class="form-control" value="<?= $chambre->getPrix() ?>">
          </div>
          <div class="form-group col-6">
               <label for="">Nombre lits</label>
               <input type="number" name="nblits" class="form-control" value="<?= $chambre->getNbLits() ?>">
          </div>

          <div class="form-group col-6">
               <label for="">Nombre personnes</label>
               <input type="number" name="nbpers" class="form-control" value="<?= $chambre->getNbPers() ?>">
          </div>
          <div class="form-group col-6">
               <label for="">Image</label>
               <input type="file" name="image" accept="image/*" class="form-control">
               <input type="hidden" name="nomImage" value="<?= $chambre->getImage() ?>">
          </div>

          <div class="form-group col-6">
               <label for="">Description</label>
               <textarea name="description" class="form-control"> <?= $chambre->getDescription() ?> </textarea>
          </div>

          <div class="form-group col-6 mt-1">
               <img src="img/<?= $chambre->getImage() ?>" alt="">
          </div>
     </div>
     <input type="submit" class="btn btn-success mt-3">
</form>