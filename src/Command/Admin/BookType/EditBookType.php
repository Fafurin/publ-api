<?php

namespace App\Command\Admin\BookType;

use App\Exception\BookTypeNotFoundException;
use App\Model\Admin\BookType\BookTypeResponse;
use App\Repository\BookTypeRepository;

class EditBookType implements EditBookTypeInterface
{
    public function __construct(
        private readonly BookTypeRepository $repository,
    ) {
    }

    public function handle(int $id): BookTypeResponse
    {
        if (!$this->repository->existsById($id)) {
            throw new BookTypeNotFoundException();
        }
        $bookType = $this->repository->find($id);

        return (new BookTypeResponse())
            ->setId($bookType->getId())
            ->setTitle($bookType->getTitle());
    }

}
