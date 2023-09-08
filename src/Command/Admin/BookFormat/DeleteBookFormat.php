<?php

namespace App\Command\Admin\BookFormat;

use App\Exception\BookFormatNotFoundException;
use App\Repository\BookFormatRepository;
use Doctrine\ORM\EntityManagerInterface;

class DeleteBookFormat implements DeleteBookFormatInterface
{
    public function __construct(
        private readonly BookFormatRepository   $repository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function handle(int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new BookFormatNotFoundException();
        }
        $bookFormat = $this->repository->find($id);

        $bookFormat->setIsDeleted('true');

        $this->em->persist($bookFormat);
        $this->em->flush();
    }

}
