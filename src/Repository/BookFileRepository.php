<?php

namespace App\Repository;

use App\Entity\BookFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookFile[]    findAll()
 * @method BookFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookFile::class);
    }

}
