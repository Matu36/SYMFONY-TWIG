<?php

namespace App\Repository;

use App\Entity\POSTIMAGE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<POSTIMAGE>
 *
 * @method POSTIMAGE|null find($id, $lockMode = null, $lockVersion = null)
 * @method POSTIMAGE|null findOneBy(array $criteria, array $orderBy = null)
 * @method POSTIMAGE[]    findAll()
 * @method POSTIMAGE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POSTIMAGERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, POSTIMAGE::class);
    }

    public function add(POSTIMAGE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(POSTIMAGE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return POSTIMAGE[] Returns an array of POSTIMAGE objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?POSTIMAGE
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllPostImageWithRelations()
    {
        $qb = $this->createQueryBuilder('pi')
            ->leftJoin('pi.postPostImage', 'p')
            ->addSelect('p')
            ->leftJoin('pi.imagenPostImage', 'i')
            ->addSelect('i')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findPostImageByIdWithRelations(int $id)
    {
        $qb = $this->createQueryBuilder('pi')
            ->andWhere('pi.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('pi.postPostImage', 'p')
            ->addSelect('p')
            ->leftJoin('pi.imagenPostImage', 'i')
            ->addSelect('i')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
