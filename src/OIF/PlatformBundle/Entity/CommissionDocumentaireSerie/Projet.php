<?php

namespace OIF\PlatformBundle\Entity\CommissionDocumentaireSerie;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


/**
 * Projet
 *
 * @ORM\Table(name="oif_commission_documentaireSerie_projet")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionDocumentaireSerie\ProjetRepository")
 */
class Projet{
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
     * @ORM\Column(name="typeIntervention", type="smallint")
     */
    private $typeIntervention;

    /**
     * @var int
     *
     * @ORM\Column(name="genre", type="smallint")
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
     * @var int
     *
     * @ORM\Column(name="episode", type="smallint")
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "Le nombre d'épisode ne peut pas être inférieur à {{ limit }}"
     * )
     */
    private $episode;

    /**
     * @var int
     *
     * @ORM\Column(name="support", type="smallint")
     */
    private $support;

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
     * @var string
     *
     * @ORM\Column(name="nomStructure", type="string", length=255)
     */
    private $nomStructure;

    /**
     * @var int
     *
     * @ORM\Column(name="capital", type="smallint")
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="devise", type="string", length=255)
     */
    private $devise;

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
     * @ORM\Column(name="telResponsable", type="string", length=255)
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeb", type="date")
     * @Assert\Date()
     */
    private $dateDeb;

    /**
     * @var \DateTime
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
     * @var int
     *
     * @ORM\Column(name="montantDemande", type="integer")
     */
    private $montantDemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="date")
     */
    private $dateCreation;

    /**
     * @var int
     *
     * @ORM\Column(name="anneeNaissance", type="smallint")
     * @Assert\Length(min=4, max=4, minMessage="L'année de naissance doit tenir sous {{ limit }} chiffres.", maxMessage="L'année de naissance doit tenir sous {{ limit }} chiffres.")
     */
    private $anneeNaissance;

    /**
     * @var smallint
     *
     * @ORM\Column(name="typeStructure", type="smallint")
     */
    private $typeStructure;


    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Fichier", mappedBy="projet", cascade={"remove"})
     */
    protected $fichiers;
    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Lien", mappedBy="projet", cascade={"remove"})
     */
    protected $liens;
    /**
     * @ORM\OneToMany(targetEntity="OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Financement", mappedBy="projet", cascade={"remove"})
     */
    protected $financements;
    /**
     * @ORM\ManyToOne(targetEntity="OIF\PlatformBundle\Entity\Commission", inversedBy="projetsDocumentaireSeries")
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
        if( $this->getGenre() != 3 && $this->getFormat() == 1 ){
            $context
                ->buildViolation("Le format unitaire est exclusivement réservé aux Documentaires. Les animations ou fictions doivent obligatoirement être des séries !")
                ->atPath('format')
                ->addViolation()
            ;
        }
        if( $this->getFormat() == 1 && $this->getEpisode() > 1 ){
            $context
                ->buildViolation("Le format unitaire implique qu'il n'y ait qu'un seul épisode !")
                ->atPath('format')
                ->addViolation()
            ;
        }
    }
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
     * @return int
     */
    public function getFormat()
    {
        return $this->format;
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
     * Set episode
     *
     * @param string $episode
     *
     * @return Projet
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return string
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set support
     *
     * @param integer $support
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
     * @return int
     */
    public function getSupport()
    {
        return $this->support;
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
     * Set capital
     *
     * @param string $capital
     *
     * @return Projet
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return string
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set devise
     *
     * @param string $devise
     *
     * @return Projet
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return string
     */
    public function getDevise()
    {
        return $this->devise;
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
     * @return int
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
     * @return int
     */
    public function getMontantDemande()
    {
        return $this->montantDemande;
    }

    /**
     * Set dateCreation
     *
     * @param string $dateCreation
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
     * @return string
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
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
     * Add fichier
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Fichier $fichier
     *
     * @return Projet
     */
    public function addFichier(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Fichier $fichier)
    {
        $this->fichiers[] = $fichier;

        return $this;
    }

    /**
     * Remove fichier
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Fichier $fichier
     */
    public function removeFichier(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Fichier $fichier)
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
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Lien $lien
     *
     * @return Projet
     */
    public function addLien(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Lien $lien)
    {
        $this->liens[] = $lien;

        return $this;
    }

    /**
     * Remove lien
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Lien $lien
     */
    public function removeLien(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Lien $lien)
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
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Financement $financement
     *
     * @return Projet
     */
    public function addFinancement(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Financement $financement)
    {
        $this->financements[] = $financement;

        return $this;
    }

    /**
     * Remove financement
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Financement $financement
     */
    public function removeFinancement(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Financement $financement)
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
}
