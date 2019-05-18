<?php

namespace App\Repository;

use App\Entity\ProviderType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProviderType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProviderType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProviderType[]    findAll()
 * @method ProviderType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProviderTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProviderType::class);
    }

    // /**
    //  * @return ProviderType[] Returns an array of ProviderType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProviderType
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
