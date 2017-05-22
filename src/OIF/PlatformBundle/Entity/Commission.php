<?php

namespace OIF\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commission
 *
 * @ORM\Table(name="commission")
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="objectif", type="string", length=255, nullable=true)
     */
    private $objectif;

    /**
     * @var string
     *
     * @ORM\Column(name="calendrier", type="string", length=255, nullable=true)
     */
    private $calendrier;

    /**
     * @var string
     *
     * @ORM\Column(name="eligibilite", type="string", length=255, nullable=true)
     */
    private $eligibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="recevabilite", type="string", length=255, nullable=true)
     */
    private $recevabilite;

    /**
     * @var string
     *
     * @ORM\Column(name="modeDexamen", type="string", length=255, nullable=true)
     */
    private $modeDexamen;

    /**
     * @var string
     *
     * @ORM\Column(name="criteres", type="string", length=255, nullable=true)
     */
    private $criteres;

    /**
     * @var string
     *
     * @ORM\Column(name="contrepartie", type="string", length=255, nullable=true)
     */
    private $contrepartie;

    /**
     * @var string
     *
     * @ORM\Column(name="procedureDepot", type="string", length=255, nullable=true)
     */
    private $procedureDepot;

    /**
     * @var string
     *
     * @ORM\Column(name="commissionSelection", type="string", length=255, nullable=true)
     */
    private $commissionSelection;

    /**
     * @var string
     *
     * @ORM\Column(name="modeAide", type="string", length=255, nullable=true)
     */
    private $modeAide;

    /**
     * @var string
     *
     * @ORM\Column(name="listePieces", type="string", length=255, nullable=true)
     */
    private $listePieces;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    private $etat;

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
     * Set description
     *
     * @param string $description
     *
     * @return Commission
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set objectif
     *
     * @param string $objectif
     *
     * @return Commission
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * Get objectif
     *
     * @return string
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set calendrier
     *
     * @param string $calendrier
     *
     * @return Commission
     */
    public function setCalendrier($calendrier)
    {
        $this->calendrier = $calendrier;

        return $this;
    }

    /**
     * Get calendrier
     *
     * @return string
     */
    public function getCalendrier()
    {
        return $this->calendrier;
    }

    /**
     * Set eligibilite
     *
     * @param string $eligibilite
     *
     * @return Commission
     */
    public function setEligibilite($eligibilite)
    {
        $this->eligibilite = $eligibilite;

        return $this;
    }

    /**
     * Get eligibilite
     *
     * @return string
     */
    public function getEligibilite()
    {
        return $this->eligibilite;
    }

    /**
     * Set recevabilite
     *
     * @param string $recevabilite
     *
     * @return Commission
     */
    public function setRecevabilite($recevabilite)
    {
        $this->recevabilite = $recevabilite;

        return $this;
    }

    /**
     * Get recevabilite
     *
     * @return string
     */
    public function getRecevabilite()
    {
        return $this->recevabilite;
    }

    /**
     * Set modeDexamen
     *
     * @param string $modeDexamen
     *
     * @return Commission
     */
    public function setModeDexamen($modeDexamen)
    {
        $this->modeDexamen = $modeDexamen;

        return $this;
    }

    /**
     * Get modeDexamen
     *
     * @return string
     */
    public function getModeDexamen()
    {
        return $this->modeDexamen;
    }

    /**
     * Set criteres
     *
     * @param string $criteres
     *
     * @return Commission
     */
    public function setCriteres($criteres)
    {
        $this->criteres = $criteres;

        return $this;
    }

    /**
     * Get criteres
     *
     * @return string
     */
    public function getCriteres()
    {
        return $this->criteres;
    }

    /**
     * Set contrepartie
     *
     * @param string $contrepartie
     *
     * @return Commission
     */
    public function setContrepartie($contrepartie)
    {
        $this->contrepartie = $contrepartie;

        return $this;
    }

    /**
     * Get contrepartie
     *
     * @return string
     */
    public function getContrepartie()
    {
        return $this->contrepartie;
    }

    /**
     * Set procedureDepot
     *
     * @param string $procedureDepot
     *
     * @return Commission
     */
    public function setProcedureDepot($procedureDepot)
    {
        $this->procedureDepot = $procedureDepot;

        return $this;
    }

    /**
     * Get procedureDepot
     *
     * @return string
     */
    public function getProcedureDepot()
    {
        return $this->procedureDepot;
    }

    /**
     * Set commissionSelection
     *
     * @param string $commissionSelection
     *
     * @return Commission
     */
    public function setCommissionSelection($commissionSelection)
    {
        $this->commissionSelection = $commissionSelection;

        return $this;
    }

    /**
     * Get commissionSelection
     *
     * @return string
     */
    public function getCommissionSelection()
    {
        return $this->commissionSelection;
    }

    /**
     * Set modeAide
     *
     * @param string $modeAide
     *
     * @return Commission
     */
    public function setModeAide($modeAide)
    {
        $this->modeAide = $modeAide;

        return $this;
    }

    /**
     * Get modeAide
     *
     * @return string
     */
    public function getModeAide()
    {
        return $this->modeAide;
    }

    /**
     * Set listePieces
     *
     * @param string $listePieces
     *
     * @return Commission
     */
    public function setListePieces($listePieces)
    {
        $this->listePieces = $listePieces;

        return $this;
    }

    /**
     * Get listePieces
     *
     * @return string
     */
    public function getListePieces()
    {
        return $this->listePieces;
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
}
