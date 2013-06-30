<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CompanyCriteria
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mrmcburger\GetajobBundle\Entity\CompanyCriteriaRepository")
 */
class CompanyCriteria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="displacement", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $displacement;

    /**
     * @var integer
     *
     * @ORM\Column(name="celebrity", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $celebrity;

    /**
     * @var integer
     *
     * @ORM\Column(name="missionInterest", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $missionInterest;

    /**
     * @var integer
     *
     * @ORM\Column(name="salaryExpectation", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $salaryExpectation;

    /**
     * @var integer
     *
     * @ORM\Column(name="workConditions", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $workConditions;

    /**
     * @var integer
     *
     * @ORM\Column(name="evolutionPossibilities", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $evolutionPossibilities;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set displacement
     *
     * @param integer $displacement
     * @return CompanyCriteria
     */
    public function setDisplacement($displacement)
    {
        $this->displacement = $displacement;

        return $this;
    }

    /**
     * Get displacement
     *
     * @return integer
     */
    public function getDisplacement()
    {
        return $this->displacement;
    }

    /**
     * Set celebrity
     *
     * @param integer $celebrity
     * @return CompanyCriteria
     */
    public function setCelebrity($celebrity)
    {
        $this->celebrity = $celebrity;

        return $this;
    }

    /**
     * Get celebrity
     *
     * @return integer
     */
    public function getCelebrity()
    {
        return $this->celebrity;
    }

    /**
     * Set missionInterest
     *
     * @param integer $missionInterest
     * @return CompanyCriteria
     */
    public function setMissionInterest($missionInterest)
    {
        $this->missionInterest = $missionInterest;

        return $this;
    }

    /**
     * Get missionInterest
     *
     * @return integer
     */
    public function getMissionInterest()
    {
        return $this->missionInterest;
    }

    /**
     * Set salaryExpectation
     *
     * @param integer $salaryExpectation
     * @return CompanyCriteria
     */
    public function setSalaryExpectation($salaryExpectation)
    {
        $this->salaryExpectation = $salaryExpectation;

        return $this;
    }

    /**
     * Get salaryExpectation
     *
     * @return integer
     */
    public function getSalaryExpectation()
    {
        return $this->salaryExpectation;
    }

    /**
     * Set workConditions
     *
     * @param integer $workConditions
     * @return CompanyCriteria
     */
    public function setWorkConditions($workConditions)
    {
        $this->workConditions = $workConditions;

        return $this;
    }

    /**
     * Get workConditions
     *
     * @return integer
     */
    public function getWorkConditions()
    {
        return $this->workConditions;
    }

    /**
     * Set evolutionPossibilities
     *
     * @param integer $evolutionPossibilities
     * @return CompanyCriteria
     */
    public function setEvolutionPossibilities($evolutionPossibilities)
    {
        $this->evolutionPossibilities = $evolutionPossibilities;

        return $this;
    }

    /**
     * Get evolutionPossibilities
     *
     * @return integer
     */
    public function getEvolutionPossibilities()
    {
        return $this->evolutionPossibilities;
    }
}
