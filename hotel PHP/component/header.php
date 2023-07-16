<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <title>Hôtel</title>
</head>
<body>
     <header class="bg-secondary p-3">
          <h1 class="text-center"><a href="index.php">Hôtel</a></h1>
          <nav>
               <!-- teste si y a connexion -->
               <?php if( isset($_SESSION['user']) ): ?>
                    <a href="login.php?action=logout" class="btn btn-danger">logout</a>
                    <a href="reservations.php" class="btn btn-success">reservations</a>
                    <!-- teste si admin -->
                    <?php if( unserialize($_SESSION['user'])->getRole() == "admin" ): ?>
                         <a href="ajouter.php" class="btn btn-success">ajouter</a>
                    <?php endif; ?>
               <?php else: ?>
                    <a href="login.php" class="btn btn-success">login</a>
               <?php endif; ?>
          </nav>
                    <!-- on teste si la session existe -->
          <div> <?= isset($_SESSION['user']) 
                         ? unserialize($_SESSION['user'])->getRole() 
                         : ''; ?> 
          </div>
     </header>
     <main class="container-fluid mt-3">
     