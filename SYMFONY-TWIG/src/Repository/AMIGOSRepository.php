<?php

namespace App\Repository;

use App\Entity\AMIGOS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AMIGOS>
 *
 * @method AMIGOS|null find($id, $lockMode = null, $lockVersion = null)
 * @method AMIGOS|null findOneBy(array $criteria, array $orderBy = null)
 * @method AMIGOS[]    findAll()
 * @method AMIGOS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AMIGOSRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AMIGOS::class);
    }

    public function add(AMIGOS $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AMIGOS $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return AMIGOS[] Returns an array of AMIGOS objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AMIGOS
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllAmigosWithRelations()
    {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.usuariosSenderAmigos', 'u')
            ->addSelect('u')
            ->leftJoin('a.usuariosReceptorAmigos', 'f')
            ->addSelect('f')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findAmigosByIdWithRelations(int $id)
    {
        $qb = $this->createQueryBuilder('a')
            ->andWhere('a.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('a.usuariosSenderAmigos', 'u')
            ->addSelect('u')
            ->leftJoin('a.usuariosReceptorAmigos', 'f')
            ->addSelect('f')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
