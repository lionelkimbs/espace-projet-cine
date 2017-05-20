<?php

namespace OIF\PlatformBundle\Entity\CommissionCinema;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="oif_commission_cinema_projet")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionCinema\ProjetRepository")
 */
class Projet
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
     * @ORM\Column(name="typeIntervention", type="integer")
     */
    private $typeIntervention;

    /**
     * @var int
     *
     * @ORM\Column(name="genre", type="integer")
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="smallint")
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="support", type="string", length=255)
     */
    private $support;

    /**
     * @var string
     *
     * @ORM\Column(name="standard", type="string", length=255)
     */
    private $standard;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var smallint
     *
     * @ORM\Column(name="paysRealisateur", type="smallint")
     */
    private $paysRealisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="realisateur", type="string", length=255)
     */
    private $realisateur;


    /**
     * @var array
     *
     * @ORM\Column(name="annee", type="array")
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="nomStructure", type="string", length=255)
     */
    private $nomStructure;

    /**
     * @var smallint
     *
     * @ORM\Column(name="typeStructure", type="smallint")
     */
    private $typeStructure;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseStructure", type="string", length=255)
     */
    private $adresseStructure;

    /**
     * @var string
     *
     * @ORM\Column(name="villeStructure", type="string", length=255)
     */
    private $villeStructure;

    /**
     * @var smallint
     *
     * @ORM\Column(name="paysStructure", type="smallint")
     */
    private $paysStructure;

    /**
     * @var string
     *
     * @ORM\Column(name="nomResponsable", type="string", length=255)
     */
    private $nomResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomResponsable", type="string", length=255)
     */
    private $prenomResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="telResponsable", type="string", length=35)
     */
    private $telResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="emailResponsable", type="string", length=255)
     */
    private $emailResponsable;

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
     * @var smallint
     *
     * @ORM\Column(name="coutTotal", type="smallint")
     */
    private $coutTotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="montantDemande", type="smallint")
     */
    private $montantDemande;

    /**
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set typeIntervention
     *
     * @param integer $typeIntervention
     *
     * @return Projet
     */
    public function setTypeIntervention($typeIntervention)
    {
        $this->typeIntervention = $typeIntervention;

        return $this;
    }

    /**
     * Get typeIntervention
     *
     * @return int
     */
    public function getTypeIntervention()
    {
        return $this->typeIntervention;
    }

    /**
     * Set genre
     *
     * @param integer $genre
     *
     * @return Projet
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return int
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Projet
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return int
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Projet
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
     * Set annee
     *
     * @param array $annee
     *
     * @return Projet
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return array
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Projet
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

    public function __construct(){
        $this->date = new \DateTime();
    }

    /**
     * Set support
     *
     * @param string $support
     *
     * @return Projet
     */
    public function setSupport($support)
    {
        $this->support = $support;

        return $this;
    }

    /**
     * Get support
     *
     * @return string
     */
    public function getSupport()
    {
        return $this->support;
    }

    /**
     * Set standard
     *
     * @param string $standard
     *
     * @return Projet
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;

        return $this;
    }

    /**
     * Get standard
     *
     * @return string
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * Set paysRealisateur
     *
     * @param integer $paysRealisateur
     *
     * @return Projet
     */
    public function setPaysRealisateur($paysRealisateur)
    {
        $this->paysRealisateur = $paysRealisateur;

        return $this;
    }

    /**
     * Get paysRealisateur
     *
     * @return integer
     */
    public function getPaysRealisateur()
    {
        return $this->paysRealisateur;
    }

    /**
     * Set realisateur
     *
     * @param string $realisateur
     *
     * @return Projet
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get realisateur
     *
     * @return string
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set nomStructure
     *
     * @param string $nomStructure
     *
     * @return Projet
     */
    public function setNomStructure($nomStructure)
    {
        $this->nomStructure = $nomStructure;

        return $this;
    }

    /**
     * Get nomStructure
     *
     * @return string
     */
    public function getNomStructure()
    {
        return $this->nomStructure;
    }

    /**
     * Set typeStructure
     *
     * @param integer $typeStructure
     *
     * @return Projet
     */
    public function setTypeStructure($typeStructure)
    {
        $this->typeStructure = $typeStructure;

        return $this;
    }

    /**
     * Get typeStructure
     *
     * @return integer
     */
    public function getTypeStructure()
    {
        return $this->typeStructure;
    }

    /**
     * Set adresseStructure
     *
     * @param string $adresseStructure
     *
     * @return Projet
     */
    public function setAdresseStructure($adresseStructure)
    {
        $this->adresseStructure = $adresseStructure;

        return $this;
    }

    /**
     * Get adresseStructure
     *
     * @return string
     */
    public function getAdresseStructure()
    {
        return $this->adresseStructure;
    }

    /**
     * Set villeStructure
     *
     * @param string $villeStructure
     *
     * @return Projet
     */
    public function setVilleStructure($villeStructure)
    {
        $this->villeStructure = $villeStructure;

        return $this;
    }

    /**
     * Get villeStructure
     *
     * @return string
     */
    public function getVilleStructure()
    {
        return $this->villeStructure;
    }

    /**
     * Set paysStructure
     *
     * @param integer $paysStructure
     *
     * @return Projet
     */
    public function setPaysStructure($paysStructure)
    {
        $this->paysStructure = $paysStructure;

        return $this;
    }

    /**
     * Get paysStructure
     *
     * @return integer
     */
    public function getPaysStructure()
    {
        return $this->paysStructure;
    }

    /**
     * Set nomResponsable
     *
     * @param string $nomResponsable
     *
     * @return Projet
     */
    public function setNomResponsable($nomResponsable)
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    /**
     * Get nomResponsable
     *
     * @return string
     */
    public function getNomResponsable()
    {
        return $this->nomResponsable;
    }

    /**
     * Set prenomResponsable
     *
     * @param string $prenomResponsable
     *
     * @return Projet
     */
    public function setPrenomResponsable($prenomResponsable)
    {
        $this->prenomResponsable = $prenomResponsable;

        return $this;
    }

    /**
     * Get prenomResponsable
     *
     * @return string
     */
    public function getPrenomResponsable()
    {
        return $this->prenomResponsable;
    }

    /**
     * Set telResponsable
     *
     * @param string $telResponsable
     *
     * @return Projet
     */
    public function setTelResponsable($telResponsable)
    {
        $this->telResponsable = $telResponsable;

        return $this;
    }

    /**
     * Get telResponsable
     *
     * @return string
     */
    public function getTelResponsable()
    {
        return $this->telResponsable;
    }

    /**
     * Set emailResponsable
     *
     * @param string $emailResponsable
     *
     * @return Projet
     */
    public function setEmailResponsable($emailResponsable)
    {
        $this->emailResponsable = $emailResponsable;

        return $this;
    }

    /**
     * Get emailResponsable
     *
     * @return string
     */
    public function getEmailResponsable()
    {
        return $this->emailResponsable;
    }

    /**
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     *
     * @return Projet
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
     * @return Projet
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
     * Set coutTotal
     *
     * @param integer $coutTotal
     *
     * @return Projet
     */
    public function setCoutTotal($coutTotal)
    {
        $this->coutTotal = $coutTotal;

        return $this;
    }

    /**
     * Get coutTotal
     *
     * @return integer
     */
    public function getCoutTotal()
    {
        return $this->coutTotal;
    }

    /**
     * Set montantDemande
     *
     * @param integer $montantDemande
     *
     * @return Projet
     */
    public function setMontantDemande($montantDemande)
    {
        $this->montantDemande = $montantDemande;

        return $this;
    }

    /**
     * Get montantDemande
     *
     * @return integer
     */
    public function getMontantDemande()
    {
        return $this->montantDemande;
    }
}
