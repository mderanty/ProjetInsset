<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Projet {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_projet;

    /** @ORM\Column(type="string") */
    protected $titre_projet;

    /** @ORM\Column(type="text") */
    protected $description_projet;

    /** @ORM\Column(type="date") */
    protected $date_debut_projet;

    /** @ORM\Column(type="date") */
    protected $date_fin_projet;

    /** @ORM\Column(type="integer") */
    protected $id_status_projet;

    /** @ORM\Column(type="integer") */
    protected $user_id;

    public function getId_projet()
    {
        return $this->id_projet;
    }

    public function getTitre_projet()
    {
        return $this->titre_projet;
    }

    public function getDescription_projet()
    {
        return $this->description_projet;
    }

    public function getDate_debut_projet()
    {
        return $this->date_debut_projet;
    }

    public function getDate_fin_projet()
    {
        return $this->date_fin_projet;
    }

    public function getId_status_projet()
    {
        return $this->id_status_projet;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setTitre_projet($value)
    {
        $this->titre_projet = $value;
    }

    public function setDescription_projet($value)
    {
        $this->description_projet = $value;
    }

    public function setDate_debut_projet($value)
    {
        $this->date_debut_projet = $value;
    }

    public function setDate_fin_projet($value)
    {
        $this->date_fin_projet = $value;
    }

    public function setId_status_projet($value)
    {
        $this->id_status_projet = $value;
    }

    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

}