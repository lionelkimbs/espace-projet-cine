<?php

namespace OIF\PlatformBundle\Entity\CommissionCinema;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Piece
 *
 * @ORM\Table(name="oif_commission_cinema_piece")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionCinema\PieceRepository")
 */
class Piece
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
     * @var ArrayCollection
     *
     * @ORM\Column(name="fichier", type="array")
     */
    private $fichier;



    /**
     * @ORM\ManyToOne(targetEntity="OIF\PlatformBundle\Entity\CommissionCinema\Projet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    /**
     * Piece constructor.
     */
    public function __construct(){
        $this->fichier = new ArrayCollection();
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
     * Set fichier
     *
     * @param array $fichier
     *
     * @return Piece
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return array
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set projet
     *
     * @param \OIF\PlatformBundle\Entity\CommissionCinema\Projet $projet
     *
     * @return Piece
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
