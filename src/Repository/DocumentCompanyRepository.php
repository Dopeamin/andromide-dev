<?php

namespace App\Repository;

use App\Entity\DocumentCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentCompany[]    findAll()
 * @method DocumentCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentCompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentCompany::class);
    }

    // /**
    //  * @return DocumentCompany[] Returns an array of DocumentCompany objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentCompany
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
