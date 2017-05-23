<?php

namespace OIF\PlatformBundle\Entity\CommissionCinema;

use Doctrine\ORM\Mapping as ORM;

/**
 * Financement
 *
 * @ORM\Table(name="commission_cinema_financement")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionCinema\FinancementRepository")
 */
class Financement
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
     * @ORM\Column(name="partenaire", type="string", length=255)
     */
    private $partenaire;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="smallint")
     */
    private $montant;

    /**
     * @var bool
     *
     * @ORM\Column(name="negociation", type="boolean")
     */
    private $negociation;


    /**
     * @ORM\ManyToOne(targetEntity="OIF\PlatformBundle\Entity\CommissionCinema\Projet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

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
     * Set partenaire
     *
     * @param string $partenaire
     *
     * @return Financement
     */
    public function setPartenaire($partenaire)
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * Get partenaire
     *
     * @return string
     */
    public function getPartenaire()
    {
        return $this->partenaire;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return Financement
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set negociation
     *
     * @param boolean $negociation
     *
     * @return Financement
     */
    public function setNegociation($negociation)
    {
        $this->negociation = $negociation;

        return $this;
    }

    /**
     * Get negociation
     *
     * @return bool
     */
    public function getNegociation()
    {
        return $this->negociation;
    }

    /**
     * Set projet
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Projet $projet
     *
     * @return Financement
     */
    public function setProjet(\OIF\PlatformBundle\Entity\CommissionCinema\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \OIF\PlatformBundle\Entity\CommissionCinema\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
