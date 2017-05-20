<?php

namespace OIF\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use const null;

/**
 * Activite
 *
 * @ORM\Table(name="oif_activite")
 * @ORM\Entity(repositoryClass="OIF\CoreBundle\Repository\ActiviteRepository")
 */
class Activite{
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
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="lastNo", type="integer")
     */
    private $lastNo;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Activite
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set lastNo
     *
     * @param integer $lastNo
     *
     * @return Activite
     */
    public function setLastNo($lastNo)
    {
        $this->lastNo = $lastNo;

        return $this;
    }

    /**
     * Get lastNo
     *
     * @return integer
     */
    public function getLastNo()
    {
        return $this->lastNo;
    }

}
