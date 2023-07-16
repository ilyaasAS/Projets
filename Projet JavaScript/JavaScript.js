// Fonction pour afficher les utilisateurs sur la page home.html
function afficherUtilisateurs() {
  // Récupérer les utilisateurs enregistrés depuis le LocalStorage
  const utilisateurs = JSON.parse(localStorage.getItem("utilisateurs"));

  // Sélectionner l'élément où afficher la liste des utilisateurs
  const listeUtilisateurs = document.getElementById("listeUtilisateurs");

  // Vider le contenu de l'élément
  listeUtilisateurs.innerHTML = "";

  // Parcourir la liste des utilisateurs et les afficher
  utilisateurs.forEach(function(utilisateur) {
    // Créer un élément <li> pour chaque utilisateur
    const utilisateurElement = document.createElement("li");

    // Construire le contenu de l'élément
    const contenuUtilisateur = document.createElement("div");
    contenuUtilisateur.innerHTML = `<strong>Nom:</strong> ${utilisateur.nom} <br>
                                    <strong>Prénom:</strong> ${utilisateur.prenom}<br>
                                    <strong>Email:</strong> ${utilisateur.email}<br>
                                    <strong>Numéro de téléphone:</strong> ${utilisateur.numeroTelephone}`;

    // Ajouter le contenu à l'élément utilisateur
    utilisateurElement.appendChild(contenuUtilisateur);

    // Ajouter l'élément utilisateur à la liste
    listeUtilisateurs.appendChild(utilisateurElement);
  });
}
