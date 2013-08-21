<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Application
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mrmcburger\GetajobBundle\Entity\ApplicationRepository")
 */
class Application
{
    const APPLICATION_TYPE_PHONE = 'Téléphone';
    const APPLICATION_TYPE_MAIL = 'Email';
    const APPLICATION_TYPE_LETTER = 'Courrier';
    const APPLICATION_TYPE_SC = 'Candidature spontanée';

    public static $candidatureType = array(
        self::APPLICATION_TYPE_PHONE     => 'Téléphone',
        self::APPLICATION_TYPE_MAIL       => 'Email',
        self::APPLICATION_TYPE_LETTER    => 'Courrier',
        self::APPLICATION_TYPE_SC => 'Candidature spontanée',
    );

    public static $replyType = array(
        self::APPLICATION_TYPE_PHONE     => 'Téléphone',
        self::APPLICATION_TYPE_MAIL       => 'Email',
        self::APPLICATION_TYPE_LETTER    => 'Courrier',
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
       * @ORM\ManyToOne(targetEntity="Mrmcburger\GetajobBundle\Entity\Company")
       * @ORM\JoinColumn(nullable=false)
       * @Assert\NotNull()
       */
    private $company;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Assert\NotNull()
     * @Assert\Date()
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="cvPath", type="string", length=512, nullable=true)
     */
    private $cvPath;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="applicationLetterPath", type="string", length=512, nullable=true)
     */
    private $applicationLetterPath;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $applicationLetter;

    /**
     * @var string
     *
     * @ORM\Column(name="contactName", type="string", length=75)
     * @Assert\NotNull()
     */
    private $contactName;

    /**
     * @var string
     *
     * @ORM\Column(name="contactWay", type="string", length=25)
     * @Assert\NotNull()
     */
    private $contactWay;

    /**
     * @var string
     *
     * @ORM\Column(name="replyWay", type="string", length=25)
     * @Assert\NotNull()
     */
    private $replyWay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="replyDate", type="date")
     * @Assert\Date()
     */
    private $replyDate;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=2048, nullable=true)
     */
    private $comments;

    public function __construct()
    {
        $this->date  = $this->replyDate = new \DateTime('now');
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
     * Set company
     *
     * @param \companyTime $company
     * @return Application
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Application
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
     * Set cv
     *
     * @param string $cv
     * @return Application
     */
    public function setCvPath($cvPath)
    {
        $this->cvPath = $cvPath;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCvPath()
    {
        return $this->cvPath;
    }

    /**
     * Set applicationLetter
     *
     * @param string $applicationLetter
     * @return Application
     */
    public function setApplicationLetterPath($applicationLetterPath)
    {
        $this->applicationLetterPath = $applicationLetterPath;

        return $this;
    }

    /**
     * Get applicationLetter
     *
     * @return string
     */
    public function getApplicationLetterPath()
    {
        return $this->applicationLetterPath;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     * @return Application
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
     * Set contactWay
     *
     * @param string $contactWay
     * @return Application
     */
    public function setContactWay($contactWay)
    {
        $this->contactWay = $contactWay;

        return $this;
    }

    /**
     * Get contactWay
     *
     * @return string
     */
    public function getContactWay()
    {
        return $this->contactWay;
    }

    /**
     * Set replyWay
     *
     * @param string $replyWay
     * @return Application
     */
    public function setReplyWay($replyWay)
    {
        $this->replyWay = $replyWay;

        return $this;
    }

    /**
     * Get replyWay
     *
     * @return string
     */
    public function getReplyWay()
    {
        return $this->replyWay;
    }

    /**
     * Set replyDate
     *
     * @param \DateTime $replyDate
     * @return Application
     */
    public function setReplyDate($replyDate)
    {
        $this->replyDate = $replyDate;

        return $this;
    }

    /**
     * Get replyDate
     *
     * @return \DateTime
     */
    public function getReplyDate()
    {
        return $this->replyDate;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Application
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

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadCvRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadCvDir();
    }

    protected function getUploadApplicationLetterRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadApplicationLetterDir();
    }

    protected function getUploadCvDir()
    {
      return 'uploads/cv';
    }

    protected function getUploadApplicationLetterDir()
    {
      return 'uploads/application-letter';
    }

    public function upload()
    {
        if (null != $this->cv)
        {
            $this->cv->move($this->getUploadCvRootDir(), 'cv-'.$this->company->getName().'-'.$this->date->format('d-m-Y').'-'.$this->cv->getClientOriginalName());
            $this->cvPath = 'cv-'.$this->company->getName().'-'.$this->date->format('d-m-Y').'-'.$this->cv->getClientOriginalName();
            $this->cv = null;
        }

        if (null != $this->applicationLetter)
        {
            $this->applicationLetter->move($this->getUploadApplicationLetterRootDir(), 'application-letter-'.$this->company->getName().'-'.$this->date->format('d-m-Y').'-'.$this->applicationLetter->getClientOriginalName());
            $this->applicationLetterPath = 'application-letter-'.$this->company->getName().'-'.$this->date->format('d-m-Y').'-'.$this->applicationLetter->getClientOriginalName();
            $this->applicationLetter = null;
        }
    }
}
