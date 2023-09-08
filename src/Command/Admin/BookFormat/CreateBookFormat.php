<?php

namespace App\Command\Admin\BookFormat;

use App\Entity\BookFormat;
use App\Exception\BookFormatAlreadyExistsException;
use App\Model\Admin\BookFormat\BookFormatRequest;
use App\Repository\BookFormatRepository;
use Doctrine\ORM\EntityManagerInterface;

class CreateBookFormat implements CreateBookFormatInterface
{
    public function __construct(
        private readonly BookFormatRepository   $repository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function handle(BookFormatRequest $request): void
    {
        if ($this->repository->existsByTitle($request->getTitle())) {
            throw new BookFormatAlreadyExistsException();
        }
        $this->em->persist(
            (new BookFormat())
            ->setTitle($request->getTitle())
            ->setDesignation($request->getDesignation())
        );
        $this->em->flush();
    }

}
