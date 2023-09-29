<?php

namespace App\Repository;

use App\Entity\IMAGEN;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IMAGEN>
 *
 * @method IMAGEN|null find($id, $lockMode = null, $lockVersion = null)
 * @method IMAGEN|null findOneBy(array $criteria, array $orderBy = null)
 * @method IMAGEN[]    findAll()
 * @method IMAGEN[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IMAGENRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IMAGEN::class);
    }

    public function add(IMAGEN $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IMAGEN $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return IMAGEN[] Returns an array of IMAGEN objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?IMAGEN
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findAllImagenWithRelations()
    {
        $qb =  $this->createQueryBuilder('i')
            ->leftJoin('i.usuariosImagen', 'u')
            ->addSelect('u')
            ->leftJoin('i.levelImagen', 'l')
            ->addSelect('l')
            ->leftJoin('i.albumImagen', 'a')
            ->addSelect('a')
            ->getQuery()
            ->getResult();

        return $qb;
    }

    public function findImagenByIdWithRelations(int $id)
    {
        $qb = $this->createQueryBuilder('i')
            ->andWhere('i.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('i.usuariosImagen', 'u')
            ->addSelect('u')
            ->leftJoin('i.levelImagen', 'l')
            ->addSelect('l')
            ->leftJoin('i.albumImagen', 'a')
            ->addSelect('a')
            ->getQuery()
            ->getOneOrNullResult();

        return $qb;
    }
}
