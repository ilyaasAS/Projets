<?php 

class CommandeModel extends ModelGenerique{

     public function inserer(Commande $commande){
          var_dump($commande);
          $query = "INSERT INTO commande VALUES(NULL, :membre, :agence, :vehicule, :debut, :fin, :total, now())";

          $this->executeRequete($query, [
               "membre"       => $commande->getId_membre(),
               "agence"       => $commande->getId_agence(),
               "vehicule"     => $commande->getId_vehicule(),
               "debut"        => $commande->getDate_heure_depart(),
               "fin"          => $commande->getDate_heure_fin(),
               "total"        => $commande->getPrix_total()
          ]);
     }

     public function commandes(){
          $stmt = $this->executeRequete("SELECT * FROM commande ORDER BY date_heure_fin");

        $tab = [];

        while($res = $stmt->fetch()){
            $m = new Commande($res);
            $tab[] = $m;
        }

        return $tab;
     }

     public function commandesByClient(int $id_client){
          $stmt = $this->executeRequete("SELECT * FROM commande WHERE id_membre = :id ORDER BY date_heure_fin", ['id' => $id_client]);

        $tab = [];

        while($res = $stmt->fetch()){
            $m = new Commande($res);
            $tab[] = $m;
        }

        return $tab;
     }
}