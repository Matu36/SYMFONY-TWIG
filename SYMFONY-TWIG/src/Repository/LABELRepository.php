<?php

namespace App\Repository;

use App\Entity\LABEL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LABEL>
 *
 * @method LABEL|null find($id, $lockMode = null, $lockVersion = null)
 * @method LABEL|null findOneBy(array $criteria, array $orderBy = null)
 * @method LABEL[]    findAll()
 * @method LABEL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LABELRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LABEL::class);
    }

    public function add(LABEL $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(LABEL $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return LABEL[] Returns an array of LABEL objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LABEL
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findLevelAll()
    {
        return $this->createQueryBuilder('l')
            ->getQuery()
            ->getResult();
    }

    public function findLevelById($id)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
