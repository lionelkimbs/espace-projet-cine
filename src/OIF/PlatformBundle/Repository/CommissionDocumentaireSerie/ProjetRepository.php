<?php

namespace OIF\PlatformBundle\Repository\CommissionDocumentaireSerie;

/**
 * ProjetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjetRepository extends \Doctrine\ORM\EntityRepository{

    public function documentProjet($id){
        $queryBuilder = $this->createQueryBuilder('c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
        ;
        $projet = $queryBuilder->getQuery()->getResult();

        $pdf = new PDF_lib();
    }
}
