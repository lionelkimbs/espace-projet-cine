<?php

namespace OIF\PlatformBundle\Entity\CommissionCinema;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichier
 *
 * @ORM\Table(name="commission_cinema_fichier")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionCinema\FichierRepository")
 */
class Fichier
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="noAide", type="integer")
     */
    private $noAide;



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
     * Set url
     *
     * @param string $url
     *
     * @return Fichier
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set noAide
     *
     * @param integer $noAide
     *
     * @return Fichier
     */
    public function setNoAide($noAide)
    {
        $this->noAide = $noAide;

        return $this;
    }

    /**
     * Get noAide
     *
     * @return integer
     */
    public function getNoAide()
    {
        return $this->noAide;
    }
}
