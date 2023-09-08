<?php

namespace App\Query\Admin\BookType;

use App\Entity\BookType;
use App\Model\Admin\BookType\BookTypeListResponse;
use App\Model\Admin\BookType\BookTypeResponse;
use App\Repository\BookTypeRepository;

class BookTypeQuery implements BookTypeQueryInterface
{
    public function __construct(
        private readonly BookTypeRepository $repository,
    ) {
    }

    public function handle(): BookTypeListResponse
    {
        $types = $this->repository->findAllSortedByTitle();
        $items = array_map(
            fn (BookType $bookType) => (
                new BookTypeResponse())
                ->setId($bookType->getId())
                ->setTitle($bookType->getTitle()),
            $types
        );

        return new BookTypeListResponse($items);
    }

}
