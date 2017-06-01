<?php

namespace OIF\PlatformBundle\Entity\CommissionDocumentaireSerie;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Fichier
 *
 * @ORM\Table(name="oif_commission_documentaireSerie_fichier")
 * @ORM\Entity(repositoryClass="OIF\PlatformBundle\Repository\CommissionDocumentaireSerie\FichierRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Fichier{
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
     * @ORM\Column(name="noaide", type="integer")
     */
    private $noaide;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;


    /**
     * @ORM\ManyToOne(targetEntity="OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet", inversedBy="fichiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;


    private $tempFilename; // On ajoute cet attribut pour y stocker le nom du fichier temporairement

    /**
     * @Assert\File(
     *     maxSize = "2M",
     *     maxSizeMessage = "Ce fichier est trop lourd. La taille maximale acceptée est {{ limit }} {{ suffix }}",
     *     mimeTypes = {"application/pdf", "application/x-pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"},
     *     mimeTypesMessage = "Merci d'uploader un fichier valide (PDF ou Word)"
     * )
     */
    private $file;
    public function getFile(){
        return $this->file;
    }
    public function setFile(UploadedFile $file = null){
        $this->file = $file;
        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->url) {
            // On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->url;
            // On réinitialise les valeurs des attributs url et alt
            $this->url = null;
        }
    }
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload(){
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file) {
            return;
        }
        // Le nom du fichier est son id, on doit juste stocker également son extension Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « url »
        $this->url = $this->file->guessExtension();
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload(){
        // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
        if (null === $this->file) {
            return;
        }
        // Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir().'/'. $this->projet->getId() .'-'. $this->noaide . '.'.$this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
            $this->getUploadRootDir(), // Le répertoire de destination
            $this->projet->getId() .'-'. $this->noaide . '.' .$this->url   // Le nom du fichier à créer, ici « id.extension »
        );
    }
    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload(){
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'. $this->projet->getId() .'-'. $this->noaide . '.' . $this->url;
    }
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload(){
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }
    public function getUploadDir(){
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'uploads/projets/com_documentaireserie/projet-' . $this->projet->getId() ;
    }
    protected function getUploadRootDir(){
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../../web/'.$this->getUploadDir();
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
     * Set noaide
     *
     * @param integer $noaide
     *
     * @return Fichier
     */
    public function setNoaide($noaide)
    {
        $this->noaide = $noaide;

        return $this;
    }

    /**
     * Get noaide
     *
     * @return integer
     */
    public function getNoaide()
    {
        return $this->noaide;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Fichier
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
     * Set projet
     *
     * @param \OIF\PlatformBundle\Entity\CommissionDocumentaireSerie\Projet $projet
     *
     * @return Fichier
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
