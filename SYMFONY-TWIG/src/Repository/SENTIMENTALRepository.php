<?php

namespace App\Repository;

use App\Entity\SENTIMENTAL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SENTIMENTAL>
 *
 * @method SENTIMENTAL|null find($id, $lockMode = null, $lockVersion = null)
 * @method SENTIMENTAL|null findOneBy(array $criteria, array $orderBy = null)
 * @method SENTIMENTAL[]    findAll()
 * @method SENTIMENTAL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SENTIMENTALRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SENTIMENTAL::class);
    }

    public function add(SENTIMENTAL $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SENTIMENTAL $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return SENTIMENTAL[] Returns an array of SENTIMENTAL objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SENTIMENTAL
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findSentimentalAll()
    {
        $qb = $this->createQueryBuilder('s')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findSentimentalById($id)
    {
        $qb = $this->createQueryBuilder('s')
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
