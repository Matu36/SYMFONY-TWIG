<?php

namespace App\Repository;

use App\Entity\NOTIFICACIONES;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NOTIFICACIONES>
 *
 * @method NOTIFICACIONES|null find($id, $lockMode = null, $lockVersion = null)
 * @method NOTIFICACIONES|null findOneBy(array $criteria, array $orderBy = null)
 * @method NOTIFICACIONES[]    findAll()
 * @method NOTIFICACIONES[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NOTIFICACIONESRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NOTIFICACIONES::class);
    }

    public function add(NOTIFICACIONES $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NOTIFICACIONES $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return NOTIFICACIONES[] Returns an array of NOTIFICACIONES objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('n.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?NOTIFICACIONES
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllNotificacionesWithRelations()
    {
        $qb = $this->createQueryBuilder('n')
            ->leftJoin('n.usuariosSenderNotificacion', 'u')
            ->addSelect('u')
            ->leftJoin('n.usuariosReceptorNotificacion', 'r')
            ->addSelect('r')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findNotificacionesByIdWithRelations(int $id)
    {
        $qb = $this->createQueryBuilder('n')
            ->andWhere('n.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('n.usuariosSenderNotificacion', 'u')
            ->addSelect('u')
            ->leftJoin('n.usuariosReceptorNotificacion', 'r')
            ->addSelect('r')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
