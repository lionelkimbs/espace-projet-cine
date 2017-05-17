<?php
// src/OIF/UserBundle/DataFixtures/ORM/LoadUser.php

namespace OIF\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use OIF\UserBundle\Entity\User;

class LoadUser implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Les noms d'utilisateurs à créer
        $listNames = array('PierreBarrot', 'LionelKimbs', 'Anna');
        $listEmails = array('pierre.barrot@francophonie.org', 'lionelkimbs@gmail.com', 'toto@yahoo.fr');

        $i = 0;
        foreach ($listNames as $name) {
            // On crée l'utilisateur
            $user = new User;

            // Le nom d'utilisateur et le mot de passe sont identiques pour l'instant
            $user->setUsername($name);
            $user->setPassword($name);
            $user->setEmail($listEmails[$i]);
            $user->setTelephone($i .'000000000');
            $user->setPortable('220000000'. $i);

            // On ne se sert pas du sel pour l'instant
            $user->setSalt('');
            // On définit uniquement le role ROLE_USER qui est le role de base
            $user->setRoles(array('ROLE_USER'));

            // On le persiste
            $manager->persist($user);
            $i++;
        }

        // On déclenche l'enregistrement
        $manager->flush();
    }
}