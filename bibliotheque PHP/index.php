<?php 

include "Livre.php";
include "Bibliotheque.php";

$pdo = new PDO(
     "mysql:host=localhost;dbname=rh_bibliotheque","root", ""
);

$stmt = $pdo->prepare("SELECT * FROM livre");

$stmt->execute();

if( $stmt->rowCount() != 0 ){

     $b1 = new Bibliotheque();

     while( $resultat = $stmt->fetch() ){
          $livre = new Livre($resultat['titre'], $resultat['auteur'], $resultat['editeur']);
          $b1->ajouter($livre);
     }
  
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <title>Bibliothèque</title>
</head>
<body>

     <header class="bg-secondary p-4">
          <a class="btn btn-primary" href="ajouter.php">Ajouter un livre</a>
          <a class="btn btn-primary" href="index.php">Afficher bibliothèque</a>
     </header>

     <main class="container-fluid my-5">
          <table class="table table-striped">
               <tr class="table-dark">
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
               </tr>

               <?php foreach($b1->getLivres() as $key => $livre): ?>
                    <tr>
                         <td> <?php echo $livre->getTitre(); ?> </td>
                         <td> <?= $livre->getAuteur(); ?> </td>
                         <td> <?= $livre->getEditeur(); ?> </td>
                    </tr>
               <?php endforeach; ?>

          </table>
     </main>
     
</body>
</html>