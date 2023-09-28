<?php

namespace App\Repository;

use App\Entity\EQUIPO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EQUIPO>
 *
 * @method EQUIPO|null find($id, $lockMode = null, $lockVersion = null)
 * @method EQUIPO|null findOneBy(array $criteria, array $orderBy = null)
 * @method EQUIPO[]    findAll()
 * @method EQUIPO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EQUIPORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EQUIPO::class);
    }

    public function add(EQUIPO $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EQUIPO $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EQUIPO[] Returns an array of EQUIPO objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EQUIPO
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

public function findAllEquipoWithRelations()
{
    return $this->createQueryBuilder('e')
        ->leftJoin('e.usuariosEquipo', 'u')
        ->addSelect('u')
        ->getQuery()
        ->getResult();
}

public function findEequipoByIdWithRelations(int $id)
{
    return $this->createQueryBuilder('e')
        ->andWhere('e.id = :id')
        ->setParameter('id', $id)
        ->leftJoin('e.usuariosEquipo', 'u')
        ->addSelect('u')
        ->getQuery()
        ->getOneOrNullResult();
}
}

