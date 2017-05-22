<?php

namespace OIF\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OIF\CoreBundle\Entity\Pays;

class LoadPays implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $libelles = array(
            array('libelle' => 'Albanie', 'noPays' => 6, 'code' => 'AL'),
            array('libelle' => 'Andorre', 'noPays' => 2, 'code' => 'AD'),
            array('libelle' => 'Arménie', 'noPays' => 7, 'code' => 'AM'),
            array('libelle' => 'Belgique', 'noPays' => 20, 'code' => 'BE'),
            array('libelle' => 'Bénin', 'noPays' => 25, 'code' => 'BJ'),
            array('libelle' => 'Bulgarie', 'noPays' => 22, 'code' => 'BG'),
            array('libelle' => 'Burkina Faso', 'noPays' => 21, 'code' => 'BF'),
            array('libelle' => 'Burundi', 'noPays' => 24, 'code' => 'BI'),
            array('libelle' => 'Cambodge', 'noPays' => 37, 'code' => 'CB'),
            array('libelle' => 'Cameroun', 'noPays' => 46, 'code' => 'CM')
        );

        foreach($libelles as $libelle){
            // On crée la catégorie
            $pays = new Pays() ;
            $pays->setLibelle($libelle['libelle']);
            $pays->setCode($libelle['code']);
            $pays->setNoPays($libelle['noPays']);
            // On la persiste
            $manager->persist($pays);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}
