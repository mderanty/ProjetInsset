<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class StatusProjet {
   
     /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id_status_projet;

    /** @ORM\Column(type="string") */
    protected $libelle_status_projet;
    
   
   
    public function getId_status_projet()
    {
        return $this->id_status_projet;
    }
    public function getLibelle_status_projet()
    {
        return $this->libelle_status_projet;
    }

    public function setId_status_projet($value)
    {
        $this->id_status_projet = $value;
    }
    public function setLibelle_status_projet($value)
    {
        $this->libelle_status_projet = $value;
    }

}