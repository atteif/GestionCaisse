<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * Many Article have one Caisse. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Caisse", inversedBy="articles")
     * @ORM\JoinColumn(name="caisse_id", referencedColumnName="id")
     */
    private $caisse;


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
     * Set label
     *
     * @param string $label
     *
     * @return Article
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Article
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Get many Article have one Caisse. This is the owning side.
     * 
     * @return \AppBundle\Entity\Caisse
     */ 
    public function getCaisse()
    {
        return $this->caisse;
    }

    /**
     * Set many Article have one Caisse. This is the owning side.
     *
     * @param \AppBundle\Entity\Caisse $caisse
    *
    * @return Caisse
     */ 
    public function setCaisse($caisse)
    {
        $this->caisse = $caisse;

        return $this;
    }

   
}

