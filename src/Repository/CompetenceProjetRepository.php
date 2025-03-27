<?php

namespace App\Repository;

use App\Entity\CompetenceProjet;
use App\Entity\CompetenceStage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompetenceProjet>
 */
class CompetenceProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompetenceProjet::class);
    }


    public function countByTotalProjectsByCompetence($competenceId)
    {
        $qb = $this->createQueryBuilder('cp')
            ->select('COUNT(DISTINCT cp.Nprojets) + COUNT(DISTINCT cs.Nstages) AS totalProjectCount')
            ->leftJoin(CompetenceStage::class, 'cs', 'WITH', 'cs.Ncompetencesstages = cp.NCompetence')
            ->where('cp.NCompetence = :id')
            ->setParameter('id', $competenceId);
    
        return $qb->getQuery()->getSingleScalarResult();
    }
    





    //    /**
    //     * @return CompetenceProjet[] Returns an array of CompetenceProjet objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CompetenceProjet
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
