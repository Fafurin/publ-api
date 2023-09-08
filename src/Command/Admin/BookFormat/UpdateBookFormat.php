<?php

namespace App\Command\Admin\BookFormat;

use App\Exception\BookFormatNotFoundException;
use App\Model\Admin\BookFormat\BookFormatRequest;
use App\Repository\BookFormatRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpdateBookFormat implements UpdateBookFormatInterface
{
    public function __construct(
        private readonly BookFormatRepository   $repository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function handle(BookFormatRequest $request, int $id): void
    {
        if (!$this->repository->existsById($id)) {
            throw new BookFormatNotFoundException();
        }
        $this->em->persist(
            $this->repository->find($id)
            ->setTitle($request->getTitle())
            ->setDesignation($request->getDesignation())
        );
        $this->em->flush();
    }

}
