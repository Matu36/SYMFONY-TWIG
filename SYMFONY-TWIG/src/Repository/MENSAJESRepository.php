<?php

namespace App\Repository;

use App\Entity\MENSAJES;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MENSAJES>
 *
 * @method MENSAJES|null find($id, $lockMode = null, $lockVersion = null)
 * @method MENSAJES|null findOneBy(array $criteria, array $orderBy = null)
 * @method MENSAJES[]    findAll()
 * @method MENSAJES[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MENSAJESRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MENSAJES::class);
    }

    public function add(MENSAJES $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MENSAJES $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return MENSAJES[] Returns an array of MENSAJES objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?MENSAJES
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllCorazonWithRelations()
    {
        $qb = $this->createQueryBuilder('m')
            ->leftJoin('m.usuariosMensajes', 'u')
            ->addSelect('u')
            ->leftJoin('m.conversacionMensajes', 'c')
            ->addSelect('c')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findCorazonByIdWithRelations(int $id)
    {
        $qb = $this->createQueryBuilder('c')
            ->andWhere('m.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('m.usuariosMensajes', 'u')
            ->addSelect('u')
            ->leftJoin('m.conversacionMensajes', 'c')
            ->addSelect('c')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
