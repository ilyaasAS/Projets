<?php

class Client
{
    private $id_client;
    private $prenom;
    private $nom;
    private $tel;


    public function __construct($id_client, $prenom, $nom, $tel)
    {
        $this->setId_client($id_client);
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setTel($tel);
    }

    public function getId_client()
    {
        return $this->id_client;
    }


    public function setId_client($id_client) : self
    {
        $this->id_client = $id_client;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom) : self
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom) : self
    {
        $this->nom = $nom;

        return $this;
    }


    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel) : self
    {
        $this->tel = $tel;

        return $this;
    }
}