<?php

namespace OIF\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use const null;

/**
 * Pays
 *
 * @ORM\Table(name="oif_pays")
 * @ORM\Entity(repositoryClass="OIF\CoreBundle\Repository\PaysRepository")
 */
class Pays
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
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="noPays", type="integer", unique=true)
     */
    private $noPays;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, unique=true)
     */
    private $code;

    /**
     * @var smallint
     *
     * @ORM\Column(name="noZone", type="smallint", nullable=true)
     */
    private $noZone;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Pays
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
     * Set code
     *
     * @param string $code
     *
     * @return Pays
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set noPays
     *
     * @param integer $noPays
     *
     * @return Pays
     */
    public function setNoPays($noPays)
    {
        $this->noPays = $noPays;

        return $this;
    }

    /**
     * Get noPays
     *
     * @return integer
     */
    public function getNoPays()
    {
        return $this->noPays;
    }

    /**
     * Set noZone
     *
     * @param integer $noZone
     *
     * @return Pays
     */
    public function setNoZone($noZone)
    {
        $this->noZone = $noZone;

        return $this;
    }

    /**
     * Get noZone
     *
     * @return integer
     */
    public function getNoZone()
    {
        return $this->noZone;
    }
}
