<?php

namespace App\Command\User\BookOrder;

use App\Exception\BookOrderNotFoundException;
use App\Model\User\BookOrderRequest;
use App\Repository\BookOrderRepository;
use Doctrine\ORM\EntityManagerInterface;

class UpdateBookOrder implements UpdateBookOrderInterface
{
    public function __construct(
        private readonly BookOrderRepository $bookOrderRepository,
        private readonly EntityManagerInterface $em
    ) {
    }

    public function handle(BookOrderRequest $request, int $id): void
    {
        if (!$this->bookOrderRepository->existsById($id)) {
            throw new BookOrderNotFoundException();
        }

        $bookOrder = $this->bookOrderRepository->find($id);

        $publicationDate = null;

        if (null !== $request->getPublicationDate()) {
            $publicationDate = \DateTimeImmutable::createFromFormat('Y-m-d', $request->getPublicationDate());
        }

        $book = $bookOrder->getBook()
            ->setTitle($request->getTitle())
            ->setAuthors($request->getAuthors())
            ->setCirculation($request->getCirculation())
            ->setIsbn($request->getIsbn())
            ->setPublicationDate($publicationDate)
            ->setDescription($request->getDescription())
            ->setPublSheets($request->getPublSheets())
            ->setConvPrintSheets($request->getConvPrintSheets());

        $this->em->persist($book);

        $bookOrder
            ->setNumber($request->getNumber())
            ->setBook($book);

        $this->em->persist($bookOrder);

        $this->em->flush();
    }
}
