<?php

namespace App\Command\Admin\BookType;

use App\Exception\BookTypeNotFoundException;
use App\Model\Admin\BookType\BookTypeRequest;
use App\Repository\BookTypeRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpdateBookType implements UpdateBookTypeInterface
{
    public function __construct(
        private readonly BookTypeRepository     $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(BookTypeRequest $request, int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new BookTypeNotFoundException();
        }
        $bookType = $this->repository->find($id);

        $bookType->setTitle($request->getTitle());

        $this->em->persist($bookType);
        $this->em->flush();
    }

}
