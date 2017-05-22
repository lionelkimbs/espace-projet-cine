<?php

namespace OIF\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Financement
 *
 * @ORM\Table(name="financement")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\FinancementRepository")
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
     * @ORM\Column(name="negocation", type="boolean")
     */
    private $negocation;


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
     * Set negocation
     *
     * @param boolean $negocation
     *
     * @return Financement
     */
    public function setNegocation($negocation)
    {
        $this->negocation = $negocation;

        return $this;
    }

    /**
     * Get negocation
     *
     * @return bool
     */
    public function getNegocation()
    {
        return $this->negocation;
    }
}
