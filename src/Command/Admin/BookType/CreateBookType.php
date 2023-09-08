<?php

namespace App\Command\Admin\BookType;

use App\Entity\BookType;
use App\Exception\BookTypeAlreadyExistsException;
use App\Model\Admin\BookType\BookTypeRequest;
use App\Repository\BookTypeRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreateBookType implements CreateBookTypeInterface
{
    public function __construct(
        private readonly BookTypeRepository $repository,
        private readonly EntityManagerInterface $em,
    ) {
    }

    public function handle(BookTypeRequest $request): void
    {
        if ($this->repository->existsByTitle($request->getTitle())) {
            throw new BookTypeAlreadyExistsException();
        }

        $this->em->persist((new BookType())->setTitle($request->getTitle()));
        $this->em->flush();

    }

}
