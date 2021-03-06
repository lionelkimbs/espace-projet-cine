<?php

namespace OIF\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commission
 *
 * @ORM\Table(name="oif_commission")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionRepository")
 */
class Commission
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
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;

    /**
     *
     * @ORM\Column(name="dateDeb", type="datetime")
     */
    private $dateDeb;

    /**
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activation", type="boolean")
     */
    private $activation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="exception", type="boolean")
     */
    private $exception;

    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionCinema\Projet", mappedBy="commission")
     */
    protected $projetsCinemas;
    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet", mappedBy="commission")
     */
    protected $projetsDocumentaireSeries;



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
     * Set titre
     *
     * @param string $titre
     *
     * @return Commission
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Commission
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return Commission
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }
    /**
     * Constructor
     */
    public function __construct(){
        $this->projetsCinemas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projetsDocumentaireSeries = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activation = true;
        $this->exception = false;
    }

    /**
     * Add projetsCinema
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Projet $projetsCinema
     *
     * @return Commission
     */
    public function addProjetsCinema(\OIF\PlatformBundle\Entity\CommissionCinema\Projet $projetsCinema)
    {
        $this->projetsCinemas[] = $projetsCinema;

        return $this;
    }

    /**
     * Remove projetsCinema
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Projet $projetsCinema
     */
    public function removeProjetsCinema(\OIF\PlatformBundle\Entity\CommissionCinema\Projet $projetsCinema)
    {
        $this->projetsCinemas->removeElement($projetsCinema);
    }

    /**
     * Get projetsCinemas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjetsCinemas()
    {
        return $this->projetsCinemas;
    }

    /**
     * Add projetsDocumentaireSerie
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSerie
     *
     * @return Commission
     */
    public function addProjetsDocumentaireSerie(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSerie)
    {
        $this->projetsDocumentaireSeries[] = $projetsDocumentaireSerie;

        return $this;
    }

    /**
     * Remove projetsDocumentaireSerie
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSerie
     */
    public function removeProjetsDocumentaireSerie(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSerie)
    {
        $this->projetsDocumentaireSeries->removeElement($projetsDocumentaireSerie);
    }

    /**
     * Get projetsDocumentaireSeries
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjetsDocumentaireSeries()
    {
        return $this->projetsDocumentaireSeries;
    }

    /**
     * Set exception
     *
     * @param boolean $exception
     *
     * @return Commission
     */
    public function setException($exception)
    {
        $this->exception = $exception;

        return $this;
    }

    /**
     * Get exception
     *
     * @return boolean
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Add projetsDocumentaireSeries
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSeries
     *
     * @return Commission
     */
    public function addProjetsDocumentaireSeries(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSeries)
    {
        $this->projetsDocumentaireSeries[] = $projetsDocumentaireSeries;

        return $this;
    }

    /**
     * Remove projetsDocumentaireSeries
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSeries
     */
    public function removeProjetsDocumentaireSeries(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projetsDocumentaireSeries)
    {
        $this->projetsDocumentaireSeries->removeElement($projetsDocumentaireSeries);
    }

    /**
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     *
     * @return Commission
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return \DateTime
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Commission
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set activation
     *
     * @param boolean $activation
     *
     * @return Commission
     */
    public function setActivation($activation)
    {
        $this->activation = $activation;

        return $this;
    }

    /**
     * Get activation
     *
     * @return boolean
     */
    public function getActivation()
    {
        return $this->activation;
    }
}
