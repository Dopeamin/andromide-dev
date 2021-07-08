<?php

namespace App\Repository;

use App\Entity\VehiculeCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VehiculeCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiculeCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiculeCompany[]    findAll()
 * @method VehiculeCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeCompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiculeCompany::class);
    }

    // /**
    //  * @return VehiculeCompany[] Returns an array of VehiculeCompany objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VehiculeCompany
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
