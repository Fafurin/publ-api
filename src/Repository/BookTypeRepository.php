<?php

namespace App\Repository;

use App\Entity\BookType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookType|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookType|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookType[]    findAll()
 * @method BookType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookType::class);
    }

}
