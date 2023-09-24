<?php

namespace App\Repository;

use App\Entity\COUNTRY;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<COUNTRY>
 *
 * @method COUNTRY|null find($id, $lockMode = null, $lockVersion = null)
 * @method COUNTRY|null findOneBy(array $criteria, array $orderBy = null)
 * @method COUNTRY[]    findAll()
 * @method COUNTRY[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class COUNTRYRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, COUNTRY::class);
    }

    public function add(COUNTRY $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(COUNTRY $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return COUNTRY[] Returns an array of COUNTRY objects
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

//    public function findOneBySomeField($value): ?COUNTRY
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
