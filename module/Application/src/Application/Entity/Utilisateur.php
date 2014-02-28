<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Utilisateur {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_utilisateur;

    /** @ORM\Column(type="string") */
    protected $nom_utilisateur;

    /** @ORM\Column(type="string") */
    protected $prenom_utilisateur;

    /** @ORM\Column(type="string") */
    protected $adresse_utilisateur;

    /** @ORM\Column(type="datetime") */
    protected $date_inscription;
    
    /** @ORM\Column(type="integer") */
    protected $id_rang;

    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    public function getNom_utilisateur() {
        return $this->nom_utilisateur;
    }

    public function getPrenom_utilisateur() {
        return $this->prenom_utilisateur;
    }

    public function getAdresse_utilisateur() {
        return $this->adresse_utilisateur;
    }

    public function getDate_inscription() {
        return $this->date_inscription->format('d-m-Y');
    }

    public function getId_rang() {
        return $this->id_rang;
    }

    public function setNom_utilisateur($value) {
        $this->nom_utilisateur = $value;
    }

    public function setPrenom_utilisateur($value) {
        $this->prenom_utilisateur = $value;
    }

    public function setAdresse_utilisateur($value) {
        $this->adresse_utilisateur = $value;
    }

    public function setDate_inscription($value) {
        $this->date_inscription = $value;
    }
   
    public function setId_rang($value) {
        $this->id_rang = $value;
    }        
}
