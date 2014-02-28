<?php

namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Tache {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id_tache;

    /** @ORM\Column(type="string") */
    protected $titre_tache;
    
    /** @ORM\Column(type="text") */
    protected $description_tache;
    
    /** @ORM\Column(type="date") */
    protected $date_debut;        
    
    /** @ORM\Column(type="date") */
    protected $date_fin;
    
    /** @ORM\Column(type="integer") */
    protected $id_projet;
    
    /** @ORM\Column(type="integer") */
    protected $id_utilisateur;

    public function getId_tache()
    {
        return $this->id_tache;
    }

    public function getTitre_tache()
    {
        return $this->titre_tache;
    }
    public function getDescription_tache()
    {
        return $this->description_tache;
    }
    public function getDate_debut()
    {
        return $this->date_debut;
    }
    public function getDate_fin()
    {
        return $this->date_fin;
    }
    public function getId_projet()
    {
        return $this->id_projet;
    }
    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    public function setTitre_tache($value)
    {        
        $this->titre_tache = $value;
    }
    
    public function setDescription_tache($value)
    {
        $this->description_tache = $value;
    }
    
    public function setDate_debut($value)
    {        
        $this->date_debut= $value;
    }
    
    public function setDate_fin($value)
    {        
        $this->date_fin= $value;
    }
    public function setId_projet($value)
    {        
        $this->id_projet= $value;
    }
    public function setId_utilisateur($value)
    {        
        $this->id_utilisateur= $value;
    }
    
}