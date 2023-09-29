<?php

namespace App\Repository;

use App\Entity\CORAZON;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CORAZON>
 *
 * @method CORAZON|null find($id, $lockMode = null, $lockVersion = null)
 * @method CORAZON|null findOneBy(array $criteria, array $orderBy = null)
 * @method CORAZON[]    findAll()
 * @method CORAZON[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CORAZONRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CORAZON::class);
    }

    public function add(CORAZON $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CORAZON $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return CORAZON[] Returns an array of CORAZON objects
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

    //    public function findOneBySomeField($value): ?CORAZON
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllCorazonWithRelations()
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.usuariosCorazon', 'u')
            ->addSelect('u')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findCorazonByIdWithRelations(int $id)
    {
        $qb = $this->createQueryBuilder('c')
            ->andWhere('c.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('c.usuariosCorazon', 'u')
            ->addSelect('u')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
