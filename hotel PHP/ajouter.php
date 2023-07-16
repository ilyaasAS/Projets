<?php 
include "inc.php";
include 'component/header.php'; 

try{

     //ajout de nouvelle chambre
     if( isset($_POST["prix"]) ){
          extract($_POST);
          $nom_fichier = "";

          //teste si un fichier a été uploader
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
                    
                    }               
               }

          }


          $c = new Chambre(0, $prix, $nblits, $nbpers, $nom_fichier, $description);

          $query = "INSERT INTO chambre VALUES(NULL, :prix, :lit, :pers, :img, :desc)";

          $stmt = executerRequete($query, [
               "prix"    => $c->getPrix(),
               "lit"     => $c->getNbLits(),
               "pers"    => $c->getNbPers(),
               "img"     => $c->getImage(),
               "desc"    => $c->getDescription()
          ]);

          //redirection vers l'index. ça permet d'éviter la double soumission du formulaire
          header("location: .");
          exit;
     }



?> 
     <h2 class="text-center">Ajouter chambre</h2>

     <form action="" method="post" enctype="multipart/form-data">

          <div class="row">
               <div class="form-group col-6">
                    <label for="">Prix</label>
                    <input type="number" name="prix" class="form-control">
               </div>
               <div class="form-group col-6">
                    <label for="">Nombre lits</label>
                    <input type="number" name="nblits" class="form-control">
               </div>

               <div class="form-group col-6">
                    <label for="">Nombre personnes</label>
                    <input type="number" name="nbpers" class="form-control">
               </div>
               <div class="form-group col-6">
                    <label for="">Image</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
               </div>

               <div class="form-group col-6">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
               </div>
          </div>
          <input type="submit" class="btn btn-success mt-3">
     </form>

<?php
}catch(Exception $e){ ?>
     <h2 class="text-center">Ajouter chambre</h2>
     <div class="alert alert-danger"><?= $e->getMessage();?></div>
     <form action="" method="post" enctype="multipart/form-data">

          <div class="row">
               <div class="form-group col-6">
                    <label for="">Prix</label>
                    <input type="number" name="prix" class="form-control">
               </div>
               <div class="form-group col-6">
                    <label for="">Nombre lits</label>
                    <input type="number" name="nblits" class="form-control">
               </div>

               <div class="form-group col-6">
                    <label for="">Nombre personnes</label>
                    <input type="number" name="nbpers" class="form-control">
               </div>
               <div class="form-group col-6">
                    <label for="">Image</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
               </div>

               <div class="form-group col-6">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"></textarea>
               </div>
          </div>
          <input type="submit" class="btn btn-success mt-3">
     </form>
<?php
}
?>