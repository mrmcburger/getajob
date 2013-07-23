<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GlobalCriteria
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mrmcburger\GetajobBundle\Entity\GlobalCriteriaRepository")
 */
class GlobalCriteria
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
     * @ORM\Column(name="displacement", type="smallint")
     * @Assert\NotNull()
     * @Assert\Regex("/^\d+$/")
     */
    private $displacement;

    /**
     * @var integer
     *
     * @ORM\Column(name="celebrity", type="smallint")
     * @Assert\NotNull()
     * @Assert\Regex("/^\d+$/")
     */
    private $celebrity;

    /**
     * @var integer
     *
     * @ORM\Column(name="missionInterest", type="smallint")
     * @Assert\NotNull()
     * @Assert\Regex("/^\d+$/")
     */
    private $missionInterest;

    /**
     * @var integer
     *
     * @ORM\Column(name="salaryExpectation", type="smallint")
     * @Assert\NotNull()
     * @Assert\Regex("/^\d+$/")
     */
    private $salaryExpectation;

    /**
     * @var integer
     *
     * @ORM\Column(name="workConditions", type="smallint")
     * @Assert\NotNull()
     * @Assert\Regex("/^\d+$/")
     */
    private $workConditions;

    /**
     * @var integer
     *
     * @ORM\Column(name="evolutionPossibilities", type="smallint")
     * @Assert\NotNull()
     * @Assert\Regex("/^\d+$/")
     */
    private $evolutionPossibilities;

    public function __construct()
    {
        $this->displacement = 5;
        $this->celebrity = 5;
        $this->missionInterest = 5;
        $this->salaryExpectation = 5;
        $this->workConditions = 5;
        $this->evolutionPossibilities = 5;
    }

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
     * @return GlobalCriteria
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
     * @return GlobalCriteria
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
     * @return GlobalCriteria
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
     * @return GlobalCriteria
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
     * @return GlobalCriteria
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
     * @return GlobalCriteria
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
