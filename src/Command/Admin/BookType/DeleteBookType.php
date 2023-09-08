<?php

namespace App\Command\Admin\BookType;

use App\Exception\BookTypeNotFoundException;
use App\Repository\BookTypeRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeleteBookType implements DeleteBookTypeInterface
{
    public function __construct(
        private readonly BookTypeRepository     $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new BookTypeNotFoundException();
        }
        $bookType = $this->repository->find($id);

        $bookType->setIsDeleted('true');

        $this->em->persist($bookType);
        $this->em->flush();
    }

}
