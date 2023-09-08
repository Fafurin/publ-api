<?php

namespace App\Command\Admin\BookFormat;

use App\Exception\BookFormatNotFoundException;
use App\Model\Admin\BookFormat\BookFormatResponse;
use App\Repository\BookFormatRepository;

class EditBookFormat implements EditBookFormatInterface
{
    public function __construct(
        private readonly BookFormatRepository $repository,
    ) {
    }

    public function handle(int $id): BookFormatResponse
    {
        if (!$this->repository->existsById($id)) {
            throw new BookFormatNotFoundException();
        }
        $bookFormat = $this->repository->find($id);

        return (new BookFormatResponse())
            ->setId($bookFormat->getId())
            ->setTitle($bookFormat->getTitle())
            ->setDesignation($bookFormat->getDesignation());

    }

}
