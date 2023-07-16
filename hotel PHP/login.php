<?php 
include "inc.php";
include 'component/header.php'; 


//isset vérifie si "$_POST['login']" existe et non null
if( isset($_POST['login']) ){
     //requette pour selectionner le user via le login & mdp
     $stmt = executerRequete("SELECT * FROM utilisateurs WHERE login = :login AND password = :password", [
          "login"   => $_POST['login'],
          "password" => $_POST['password']
     ]);


     //on teste si la requête à retourner au moins une ligne
     if( $stmt->rowCount() != 0 ){

          //le fetch renvoie le résultat de la requête (un tableau associatif)
          $resultat = $stmt->fetch();

          //produit des variables. Les clés du tableau associatif deviennent des variables
          extract($resultat);

          //on crée notre objet(instance) utilisateurs
          $user = new Utilisateurs($id_user, $login, $password, $role);

          //pour garder un objet et un tableau dans une session, on va le sérealiser
          $_SESSION['user'] = serialize($user);
          
          //redirection vers l'index. ça permet d'éviter la double soumission du formulaire
          header("location: .");
          exit;
     }
}


//déconnexion
//teste si l'action existe et non null && veut logout
if( isset($_GET['action']) && $_GET['action'] == "logout" ){
     session_destroy();

     //redirection vers l'index. ça permet d'éviter la double soumission du formulaire
     header("location: .");
     exit;
}




?> 

<form action="" method="post">

     <div class="row">
          <div class="form-group col-6">
               <label for="">Login</label>
               <input type="text" value="rhalt" name="login" class="form-control">
          </div>
          <div class="form-group col-6">
               <label for="">Password</label>
               <input type="password" value="rhalt" name="password" class="form-control">
          </div>
     </div>
     <input type="submit" class="btn btn-success mt-3">
</form>