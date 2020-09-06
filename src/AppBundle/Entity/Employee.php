<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;


     /**
     * One Employee has One Assurance.
     * @ORM\OneToOne(targetEntity="Assurance", mappedBy="employee")
     */
    private $assurance;

    /**
     * One Employee has many Deplacement. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Deplacement", mappedBy="employee")
     */
    private $deplacements;

    public function __construct() {
        $this->deplacements = new ArrayCollection();
    }

    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Employee
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Employee
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Employee
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Employee
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Get one Employee has One Assurance.
     * @return \AppBundle\Entity\Assurance
     */ 
    public function getAssurance()
    {
        return $this->assurance;
    }

    /**
     * Set one Employee has One Assurance.
     *
     * @param \AppBundle\Entity\Assurance $assurance
     *
     * @return Assurance
     */ 
    public function setAssurance($assurance)
    {
        $this->assurance = $assurance;

        return $this;
    }

    /**
     * Get one Employee has many Deplacement. This is the inverse side.
     * 
     * @return \AppBundle\Entity\Deplacement
     */ 
    public function getDeplacements()
    {
        return $this->deplacements;
    }

    /**
     * Set one Employee has many Deplacement. This is the inverse side.
     *
     * @param \AppBundle\Entity\Deplacement $category
     *
     * @return Deplacement
     */ 
    public function setDeplacements($deplacements)
    {
        $this->deplacements = $deplacements;

        return $this;
    }
}

