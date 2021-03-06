<?php

namespace OIF\PlatformBundle\Entity\CommissionCinema;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

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
     * @ORM\Column(name="format", type="smallint")
     */
    private $format;

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
     * @var string
     *
     * @ORM\Column(name="realisateur", type="string", length=255)
     */
    private $realisateur;


    /**
     * @var int
     *
     * @ORM\Column(name="anneeNaissance", type="smallint")
     * @Assert\Length(min=4, max=4, minMessage="L'année de naissance doit tenir sous {{ limit }} chiffres.", maxMessage="L'année de naissance doit tenir sous {{ limit }} chiffres.")
     */
    private $anneeNaissance;

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
     * @ORM\Column(name="codePostal", type="string", length=255)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="villeStructure", type="string", length=255)
     */
    private $villeStructure;

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
     * @Assert\Email(
     *     message = "L'adresse email '{{ value }}' n'est pas valide.",
     *     checkMX = true
     * )
     */
    private $emailResponsable;

    /**
     *
     * @ORM\Column(name="dateDeb", type="date")
     * @Assert\Date()
     */
    private $dateDeb;

    /**
     *
     * @ORM\Column(name="dateFin", type="date")
     * @Assert\Date()
     */
    private $dateFin;

    /**
     * @var int
     *
     * @ORM\Column(name="coutTotal", type="integer")
     */
    private $coutTotal;

    /**
     * @var integer
     *
     * @ORM\Column(name="montantDemande", type="integer")
     */
    private $montantDemande;

    /**
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;


    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionCinema\Fichier", mappedBy="projet", cascade={"remove"})
     */
    protected $fichiers;
    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionCinema\Lien", mappedBy="projet", cascade={"remove"})
     */
    protected $liens;
    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionCinema\Financement", mappedBy="projet", cascade={"remove"})
     */
    protected $financements;
    /**
     * @ORM\ManyToOne(targetEntity="OIF\PlatformBundle\Entity\Commission", inversedBy="projetsCinemas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commission;
    /**
     * @ORM\ManyToOne(targetEntity="OIF\CoreBundle\Entity\Pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paysRealisateur;
    /**
     * @ORM\ManyToOne(targetEntity="OIF\CoreBundle\Entity\Pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paysStructure;
    /**
     * @ORM\ManyToOne(targetEntity="OIF\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @Assert\Callback
     */
    public function isContentValid(ExecutionContextInterface $context){
        if( $this->getMontantDemande() > $this->getCoutTotal() ){
            $context
                ->buildViolation("Le montant demandé à l'OIF ne peut pas être supérieur au coût total du projet !")
                ->atPath('montantDemande')
                ->addViolation()
            ;
        }
        if( $this->getDateDeb() >= $this->getDateFin() ){
            $context
                ->buildViolation("La date de début du projet ne peut pas être supérieure, ni égale à la date de fin !")
                ->atPath('dateDeb')
                ->addViolation()
            ;
        }
        if( $this->getTypeIntervention() == 2 && $this->getFormat() != 3 ){
            $context
                ->buildViolation("Les aides à la finition ne sont possibles que pour les longs-métrages !")
                ->atPath('format')
                ->addViolation()
            ;
        }
    }

    /**
     * Constructor
     */
    public function __construct(){
        $this->dateCreation = new \DateTime();
        $this->fichiers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->liens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->financements = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return integer
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
     * @return integer
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
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
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
     * Set anneeNaissance
     *
     * @param integer $anneeNaissance
     *
     * @return Projet
     */
    public function setAnneeNaissance($anneeNaissance)
    {
        $this->anneeNaissance = $anneeNaissance;

        return $this;
    }

    /**
     * Get anneeNaissance
     *
     * @return integer
     */
    public function getAnneeNaissance()
    {
        return $this->anneeNaissance;
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

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Projet
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Add fichier
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Fichier $fichier
     *
     * @return Projet
     */
    public function addFichier(\OIF\PlatformBundle\Entity\CommissionCinema\Fichier $fichier)
    {
        $this->fichiers[] = $fichier;

        return $this;
    }

    /**
     * Remove fichier
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Fichier $fichier
     */
    public function removeFichier(\OIF\PlatformBundle\Entity\CommissionCinema\Fichier $fichier)
    {
        $this->fichiers->removeElement($fichier);
    }

    /**
     * Get fichiers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFichiers()
    {
        return $this->fichiers;
    }

    /**
     * Add lien
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Lien $lien
     *
     * @return Projet
     */
    public function addLien(\OIF\PlatformBundle\Entity\CommissionCinema\Lien $lien)
    {
        $this->liens[] = $lien;

        return $this;
    }

    /**
     * Remove lien
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Lien $lien
     */
    public function removeLien(\OIF\PlatformBundle\Entity\CommissionCinema\Lien $lien)
    {
        $this->liens->removeElement($lien);
    }

    /**
     * Get liens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLiens()
    {
        return $this->liens;
    }

    /**
     * Add financement
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Financement $financement
     *
     * @return Projet
     */
    public function addFinancement(\OIF\PlatformBundle\Entity\CommissionCinema\Financement $financement)
    {
        $this->financements[] = $financement;

        return $this;
    }

    /**
     * Remove financement
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Financement $financement
     */
    public function removeFinancement(\OIF\PlatformBundle\Entity\CommissionCinema\Financement $financement)
    {
        $this->financements->removeElement($financement);
    }

    /**
     * Get financements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFinancements()
    {
        return $this->financements;
    }

    /**
     * Set commission
     *
     * @param \OIF\PlatformBundle\Entity\Commission $commission
     *
     * @return Projet
     */
    public function setCommission(\OIF\PlatformBundle\Entity\Commission $commission)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * Get commission
     *
     * @return \OIF\PlatformBundle\Entity\Commission
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * Set paysRealisateur
     *
     * @param \OIF\CoreBundle\Entity\Pays $paysRealisateur
     *
     * @return Projet
     */
    public function setPaysRealisateur(\OIF\CoreBundle\Entity\Pays $paysRealisateur)
    {
        $this->paysRealisateur = $paysRealisateur;

        return $this;
    }

    /**
     * Get paysRealisateur
     *
     * @return \OIF\CoreBundle\Entity\Pays
     */
    public function getPaysRealisateur()
    {
        return $this->paysRealisateur;
    }

    /**
     * Set paysStructure
     *
     * @param \OIF\CoreBundle\Entity\Pays $paysStructure
     *
     * @return Projet
     */
    public function setPaysStructure(\OIF\CoreBundle\Entity\Pays $paysStructure)
    {
        $this->paysStructure = $paysStructure;

        return $this;
    }

    /**
     * Get paysStructure
     *
     * @return \OIF\CoreBundle\Entity\Pays
     */
    public function getPaysStructure()
    {
        return $this->paysStructure;
    }

    /**
     * Set user
     *
     * @param \OIF\UserBundle\Entity\User $user
     *
     * @return Projet
     */
    public function setUser(\OIF\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \OIF\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set format
     *
     * @param integer $format
     *
     * @return Projet
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return integer
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     *
     * @return Projet
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }
}
