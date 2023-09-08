<?php

namespace App\Repository;

use App\Entity\BookFormat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookFormat|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookFormat|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookFormat[]    findAll()
 * @method BookFormat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookFormatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookFormat::class);
    }

    /**
     * @return BookFormat[]
     */
    public function findAllSortedByTitle(): array
    {
        return $this->findBy(['isDeleted' => 'false'], ['title' => Criteria::ASC]);
    }

    public function existsById(int $id): bool
    {
        return null !== $this->find($id);
    }

    public function existsByTitle(string $title): bool
    {
        return null !== $this->findOneBy(['title' => $title]);
    }

    public function findByTitle(string $title): BookFormat
    {
        return $this->findOneBy(['title' => $title]);
    }

}
