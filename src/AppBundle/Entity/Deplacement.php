<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deplacement
 *
 * @ORM\Table(name="deplacement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeplacementRepository")
 */
class Deplacement
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
     * @ORM\Column(name="Destination", type="string", length=255)
     */
    private $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="mission", type="string", length=255)
     */
    private $mission;


    /**
     * Many Deplacement have one Employee. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Employee", inversedBy="deplacements")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     */
    private $employee;

    


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
     * Set destination
     *
     * @param string $destination
     *
     * @return Deplacement
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set mission
     *
     * @param string $mission
     *
     * @return Deplacement
     */
    public function setMission($mission)
    {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission
     *
     * @return string
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Get many Deplacement have one Employee. This is the owning side.
     * 
     * @return \AppBundle\Entity\Employee
     */ 
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set many Deplacement have one Employee. This is the owning side.
     *
     * @param \AppBundle\Entity\Employee $employee
     *
     * @return Employee
     */ 
    public function setEmployee($employee)
    {
        $this->employee = $employee;

        return $this;
    }
}

