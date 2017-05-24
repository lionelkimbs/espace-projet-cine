<?php

namespace OIF\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="oif_user")
 * @ORM\Entity(repositoryClass="OIF\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=40, nullable=true)
     */
    protected $phone;
    /**
     * @var string
     *
     * @ORM\Column(name="cellular", type="string", length=40, nullable=true)
     */
    protected $cellular;

    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="string", length=255, nullable=true)
     */
    protected $informations;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    protected $website;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    protected $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    protected $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     */
    protected $linkedin;

    /**
     * @var bool
     *
     * @ORM\Column(name="autorisation", type="boolean", nullable=true)
     */
    protected $autorisation = true;

    /**
     * @var datetime
     *
     * @ORM\Column(name="dateInscription", type="datetime")
     */
    protected $dateInscription;
    
    /**
     * @ORM\OneToOne(targetEntity="OIF\CoreBundle\Entity\Activite")
     */
    private $activite;

    /**
     * @ORM\ManyToOne(targetEntity="OIF\CoreBundle\Entity\Pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;


    /**
     * User constructor.
     */
    public function __construct(){
        $this->dateInscription = new \DateTime();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return User
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
     * Set cellular
     *
     * @param string $cellular
     *
     * @return User
     */
    public function setCellular($cellular)
    {
        $this->cellular = $cellular;

        return $this;
    }

    /**
     * Get cellular
     *
     * @return string
     */
    public function getCellular()
    {
        return $this->cellular;
    }

    /**
     * Set informations
     *
     * @param string $informations
     *
     * @return User
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations
     *
     * @return string
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return User
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return User
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     *
     * @return User
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set autorisation
     *
     * @param boolean $autorisation
     *
     * @return User
     */
    public function setAutorisation($autorisation)
    {
        $this->autorisation = $autorisation;

        return $this;
    }

    /**
     * Get autorisation
     *
     * @return boolean
     */
    public function getAutorisation()
    {
        return $this->autorisation;
    }

    /**
     * Set dateInscription
     *
     * @param \DateTime $dateInscription
     *
     * @return User
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
     * Get dateInscription
     *
     * @return \DateTime
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * Set activite
     *
     * @param \OIF\CoreBundle\Entity\Activite $activite
     *
     * @return User
     */
    public function setActivite(\OIF\CoreBundle\Entity\Activite $activite = null)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return \OIF\CoreBundle\Entity\Activite
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set pays
     *
     * @param \OIF\CoreBundle\Entity\Pays $pays
     *
     * @return User
     */
    public function setPays(\OIF\CoreBundle\Entity\Pays $pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return \OIF\CoreBundle\Entity\Pays
     */
    public function getPays()
    {
        return $this->pays;
    }
}
