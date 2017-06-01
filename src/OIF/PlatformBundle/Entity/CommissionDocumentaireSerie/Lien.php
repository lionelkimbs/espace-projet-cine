<?php

namespace OIF\PlatformBundle\Entity\CommissionDocumentaireSerie;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lien
 *
 * @ORM\Table(name="oif_commission_documentaireSerie_lien")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionDocumentaireSerie\LienRepository")
 */
class Lien
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255)
     */
    private $lien;


    /**
     * @ORM\ManyToOne(targetEntity="OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet", inversedBy="liens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;


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
     * @return Lien
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
     * Set lien
     *
     * @param string $lien
     *
     * @return Lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set projet
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projet
     *
     * @return Lien
     */
    public function setProjet(\OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
