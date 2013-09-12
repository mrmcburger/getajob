<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Interview
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mrmcburger\GetajobBundle\Entity\InterviewRepository")
 */
class Interview
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\NotNull()
     */
    private $date;

    /**
       * @ORM\ManyToOne(targetEntity="Mrmcburger\GetajobBundle\Entity\Application")
       * @ORM\JoinColumn(nullable=false)
       * @Assert\NotNull()
       */
    private $application;

    /**
    * @ORM\OneToOne(targetEntity="Mrmcburger\GetajobBundle\Entity\Address", cascade={"persist", "remove"})
    * @ORM\JoinColumn(nullable=false)
    * @Assert\NotNull()
    */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="contactName", type="string", length=255)
     * @Assert\NotNull()
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=2048, nullable=true)
     */
    private $comments;

    public function __construct()
    {
        $this->date  = $this->date = new \DateTime('now');
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
     * Set date
     *
     * @param \DateTime $date
     * @return Interview
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set application
     *
     * @param \Application $application
     * @return Interview
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return \Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set address
     *
     * @param \Address $address
     * @return Interview
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     * @return Interview
     */
    public function setContactName($contactName)
    {
        $this->contactName = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Interview
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }
}
