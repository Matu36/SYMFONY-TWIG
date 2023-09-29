<?php

namespace App\Repository;

use App\Entity\RECOVER;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<RECOVER>
 *
 * @method RECOVER|null find($id, $lockMode = null, $lockVersion = null)
 * @method RECOVER|null findOneBy(array $criteria, array $orderBy = null)
 * @method RECOVER[]    findAll()
 * @method RECOVER[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RECOVERRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RECOVER::class);
    }

    public function add(RECOVER $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RECOVER $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return RECOVER[] Returns an array of RECOVER objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RECOVER
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function findRecoversWithUserData()
    {
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.usuarioRecover', 'u') // 'usuarioRecover' es el nombre del campo de la relación en la entidad RECOVER
            ->addSelect('u')                    // Incluir la entidad USUARIOS en la consulta
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findRecoverByIdWithUserData($id)
    {
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.usuarioRecover', 'u')
            ->addSelect('u')
            ->andWhere('r.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult(); // Utiliza getOneOrNullResult para obtener un único resultado o null si no se encuentra

        return $qb;
    }
}
