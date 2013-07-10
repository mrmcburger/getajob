<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Address
{
    const TYPE_ADDRESS_ALLEE     = 'allée';
    const TYPE_ADDRESS_RUE       = 'rue';
    const TYPE_ADDRESS_AVENUE    = 'avenue';
    const TYPE_ADDRESS_BOULEVARD = 'boulevard';
    const TYPE_ADDRESS_IMPASSE   = 'impasse';

    public static $typeAddresses = array(
        self::TYPE_ADDRESS_ALLEE     => 'allée',
        self::TYPE_ADDRESS_RUE       => 'rue',
        self::TYPE_ADDRESS_AVENUE    => 'avenue',
        self::TYPE_ADDRESS_BOULEVARD => 'boulevard',
        self::TYPE_ADDRESS_IMPASSE   => 'impasse'
    );

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotNull()
     *
     * @ORM\Column(name="number", type="string", length=10, nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @Assert\NotNull()
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @Assert\NotNull()
     *
     *  @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="additional", type="string", length=255, nullable=true)
     */
    private $additional;

    /**
     * @var string
     *
     * @Assert\NotNull()
     * @Assert\Regex("/^\d{2,}+$/")
     *
     * @ORM\Column(name="zip", type="string", length=10)
     */
    private $zip;

    /**
     * @var string
     *
     * @Assert\NotNull()
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

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
     * Set number
     *
     * @param string $number
     * @return Address
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Address
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Address
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
     * Set additional
     *
     * @param string $additional
     * @return Address
     */
    public function setAdditional($additional)
    {
        $this->additional = $additional;

        return $this;
    }

    /**
     * Get additional
     *
     * @return string
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return Address
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Magic method __clone
     */
    public function __clone()
    {
        $this->id = null;
    }

    /**
     * Method __toString
     *
     * @return string
     */
    public function __toString()
    {
        $additional = '';

        if ($this->getAdditional()) {
            $additional .= $this->getAdditional() . '<br />';
        }

        return (string) $this->getNumber() . ' ' . $this->getType() . ' ' . $this->getName() . '<br />' . $additional . $this->getZip() . ' ' . $this->getCity();
    }
}
