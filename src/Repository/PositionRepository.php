<?php

namespace App\Repository;

use App\Entity\Position;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Position|null find($id, $lockMode = null, $lockVersion = null)
 * @method Position|null findOneBy(array $criteria, array $orderBy = null)
 * @method Position[]    findAll()
 * @method Position[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Position::class);
    }

    /**
     * @return Position[]
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

}
