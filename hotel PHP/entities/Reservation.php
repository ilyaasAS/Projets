<?php

class Reservation
{
    
    private $numClient;
    private $numChambre;
    private $dateArrivee;
    private $dateDepart;

    public function __construct($numClient, $numChambre, $dateArrivee, $dateDepart)
    {
        $this->setNumClient($numClient);
        $this->setNumChambre($numChambre);
        $this->setDateArrivee($dateArrivee);
        $this->setDateDepart($dateDepart);
    }

    public function setNumClient($numClient){
          $this->numClient = $numClient;
    }

    public function getNumClient(){
          return $this->numClient;
    }

    public function setNumChambre($numChambre){
     $this->numChambre = $numChambre;
    }

    public function getNumChambre(){
     return $this->numChambre;
    }
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }


    public function setDateArrivee($dateArrivee) : self
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }


    public function getDateDepart()
    {
        return $this->dateDepart;
    }

 
    public function setDateDepart($dateDepart) : self
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }
}