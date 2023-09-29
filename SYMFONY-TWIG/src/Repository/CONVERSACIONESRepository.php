<?php

namespace App\Repository;

use App\Entity\CONVERSACIONES;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CONVERSACIONES>
 *
 * @method CONVERSACIONES|null find($id, $lockMode = null, $lockVersion = null)
 * @method CONVERSACIONES|null findOneBy(array $criteria, array $orderBy = null)
 * @method CONVERSACIONES[]    findAll()
 * @method CONVERSACIONES[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CONVERSACIONESRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CONVERSACIONES::class);
    }

    public function add(CONVERSACIONES $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CONVERSACIONES $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return CONVERSACIONES[] Returns an array of CONVERSACIONES objects
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

    //    public function findOneBySomeField($value): ?CONVERSACIONES
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllConversacionWithRelations()
    {
        $qb = $this->createQueryBuilder('con')
            ->leftJoin('con.usuariosSenderConversation', 'u')
            ->addSelect('u')
            ->leftJoin('con.usuariosReceptorConversation', 'u')
            ->addSelect('u')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findConversacionByIdWithRelations(int $id)
    {
        $qb = $this->createQueryBuilder('con')
            ->andWhere('con.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('con.usuariosSenderConversation', 'u')
            ->addSelect('u')
            ->leftJoin('con.usuariosReceptorConversation', 'u')
            ->addSelect('u')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
