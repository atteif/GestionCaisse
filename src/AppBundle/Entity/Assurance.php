<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assurance
 *
 * @ORM\Table(name="assurance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssuranceRepository")
 */
class Assurance
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
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * One Assurance has One Employee.
     * @ORM\OneToOne(targetEntity="Employee", inversedBy="assurance")
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
     * Set amount
     *
     * @param integer $amount
     *
     * @return Assurance
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get one Assurance has One Employee.
     * 
     * @return \AppBundle\Entity\Employee
     */ 
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Set one Assurance has One Employee.
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

