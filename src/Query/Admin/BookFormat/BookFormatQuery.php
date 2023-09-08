<?php

namespace App\Query\Admin\BookFormat;

use App\Entity\BookFormat;
use App\Model\Admin\BookFormat\BookFormatListResponse;
use App\Model\Admin\BookFormat\BookFormatResponse;
use App\Repository\BookFormatRepository;

class BookFormatQuery implements BookFormatQueryInterface
{
    public function __construct(
        private readonly BookFormatRepository $repository,
    ) {
    }

    public function handle(): BookFormatListResponse
    {
        $formats = $this->repository->findAllSortedByTitle();
        $items = array_map(
            fn (BookFormat $bookFormat) =>
            (new BookFormatResponse())
            ->setId($bookFormat->getId())
            ->setTitle($bookFormat->getTitle())
            ->setDesignation($bookFormat->getDesignation()),
            $formats
        );

        return new BookFormatListResponse($items);
    }

}
