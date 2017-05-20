<?php

namespace OIF\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OIF\CoreBundle\Entity\Activite;

class LoadActivite implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $libelles = array(
            array('libelle' => 'Acteur/trice', 'lastNo' => 19),
            array('libelle' => 'Attaché/e de presse', 'lastNo' => 148),
            array('libelle' => 'Chef de service d’une télévision', 'lastNo' => 317),
            array('libelle' => 'Critique de cinéma', 'lastNo' => 47),
            array('libelle' => 'Directeur/trice de casting', 'lastNo' => 258),
            array('libelle' => 'Directeur/trice de festival', 'lastNo' => 204),
            array('libelle' => 'Directeur/trice de la photo', 'lastNo' => 186),
            array('libelle' => 'Directeur/trice de télévision', 'lastNo' => 318),
            array('libelle' => 'Distributeur/trice', 'lastNo' => 193),
            array('libelle' => 'Exploitant/e de salle de cinéma', 'lastNo' => 185),
            array('libelle' => 'Financeur', 'lastNo' => 319),
            array('libelle' => 'Ingénieur du son', 'lastNo' => 17),
            array('libelle' => 'Journaliste', 'lastNo' => 59),
            array('libelle' => 'Membre d\'un organisme de promotion de la télévision', 'lastNo' => 320),
            array('libelle' => 'Membre d\'un organisme de promotion du cinéma', 'lastNo' => 321),
            array('libelle' => 'Mixeur/se', 'lastNo' => 339),
            array('libelle' => 'Monteur/se', 'lastNo' => 187),
            array('libelle' => 'Organisateur/trice de marché', 'lastNo' => 322),
            array('libelle' => 'Présentateur/trice', 'lastNo' => 329),
            array('libelle' => 'Producteur/trice', 'lastNo' => 40),
            array('libelle' => 'Programmateur/trice', 'lastNo' => 269),
            array('libelle' => 'Réalisateur/trice', 'lastNo' => 5),
            array('libelle' => 'Régisseur/se', 'lastNo' => 81),
            array('libelle' => 'Scénariste', 'lastNo' => 99),
            array('libelle' => 'Script', 'lastNo' => 214),
            array('libelle' => 'Technicien/ne', 'lastNo' => 20)
        );

        foreach($libelles as $libelle){
            // On crée la catégorie
            $activite = new Activite();

            $activite->setLibelle($libelle['libelle']);
            $activite->setLastNo($libelle['lastNo']);
            // On la persiste
            $manager->persist($activite);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}
