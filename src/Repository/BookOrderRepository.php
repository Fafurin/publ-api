<?php

namespace App\Repository;

use App\Entity\BookOrder;
use App\Exception\BookOrderNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BookOrder>
 *
 * @method BookOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookOrder[]    findAll()
 * @method BookOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookOrder::class);
    }

    /**
     * @return BookOrder[]
     */
    public function findAllSortedByUpdatedAt(): array
    {
        return $this->findBy([], ['updatedAt' => 'DESC']);
    }

    /**
     * @param int $id
     * @return BookOrder
     */
    public function getById(int $id): BookOrder
    {
        $bookOrder = $this->find($id);
        if (null === $bookOrder) {
            throw new BookOrderNotFoundException();
        }

        return $bookOrder;
    }

    public function existsById(int $id): bool
    {
        return null !== $this->find($id);
    }

}
