<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Company
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mrmcburger\GetajobBundle\Entity\CompanyRepository")
 * @UniqueEntity("name")
 */
class Company
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
    * @ORM\OneToOne(targetEntity="Mrmcburger\GetajobBundle\Entity\CompanyCriteria",cascade={"persist", "remove"})
    * @ORM\JoinColumn(nullable=false)
    * @Assert\NotNull()
    */
    private $companyCriteria;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, unique=true, nullable=false)
     * @Assert\NotNull()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sector", type="string", length=50, nullable=false)
     * @Assert\NotNull()
     */
    private $sector;

    /**
    * @ORM\OneToOne(targetEntity="Mrmcburger\GetajobBundle\Entity\Address", cascade={"persist", "remove"})
    * @ORM\JoinColumn(nullable=false)
    * @Assert\NotNull()
    */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="string", length=1024, nullable=true)
     */
    private $presentation;

    /**
     * @var string
     *
     * @ORM\Column(name="numbers", type="string", length=15, nullable=true)
     */
    private $numbers;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=25, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=150, nullable=true)
     */
    private $mail;

    /* Validateurs */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('mail', new Assert\Email(array(
            'message' => "'{{ value }}' n'est pas un email valide.",
            'checkMX' => true,
        )));
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
     * Set name
     *
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set companyCriteria
     *
     * @param string $companyCriteria
     * @return Company
     */
    public function setcompanyCriteria($companyCriteria)
    {
        $this->companyCriteria = $companyCriteria;

        return $this;
    }

    /**
     * Get companyCriteria
     *
     * @return string
     */
    public function getCompanyCriteria()
    {
        return $this->companyCriteria;
    }

    /**
     * Set sector
     *
     * @param string $sector
     * @return Company
     */
    public function setSector($sector)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return string
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     * @return Company
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set numbers
     *
     * @param string $numbers
     * @return Company
     */
    public function setNumbers($numbers)
    {
        $this->numbers = $numbers;

        return $this;
    }

    /**
     * Get numbers
     *
     * @return string
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Company
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Company
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
}
